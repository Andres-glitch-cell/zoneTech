<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    /**
     * ^ 1. showInicio() ^
     * Este es el "Cerebro" de ZoneTech.
     * Decide si mostrar el Landing (invitado) o el Dashboard (autenticado).
     */
    public function showInicio()
    {
        if (Auth::check()) {
            // Si está logueado, vamos al panel de control
            return view('inicioAutenticado');
        }

        // Si es un visitante, vemos la página de inicio normal
        return view('inicio');
    }

    /* ^ 2. index() --> Muestra los usuarios registrados en el sistema ^ */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /* ^ 3. store() --> Registro y Redirección Automática ^ */
    public function store(Request $request)
    {
        $request->validate([
            'usuario'   => 'required|string|max:50|unique:usuariosNoAutenticados,usuario',
            'email'     => 'required|email|unique:usuariosNoAutenticados,email',
            'nombre'    => 'required|string|max:100',
            'apellido1' => 'required|string|max:150',
            'apellido2' => 'required|string|max:150',
            'password'  => 'required|min:8',
        ]);

        try {
            $user = User::create([
                'usuario'         => $request->usuario,
                'email'           => $request->email,
                'nombre'          => $request->nombre,
                'apellido1'       => $request->apellido1,
                'apellido2'       => $request->apellido2,
                'contraseña_hash' => $request->password,
                'rol'             => 'usuario',
            ]);

            Auth::login($user);

            // Redirigimos a la ruta 'inicio' (donde el método showInicio decidirá la vista)
            return redirect()->route('inicio');

        } catch (\Exception $e) {
            dd("FALLO CRÍTICO EN EL REGISTRO: " . $e->getMessage());
        }
    }

    /* ^ 4. loginPost() --> Autenticación por Usuario ^ */
    public function loginPost(Request $request)
    {
        $credenciales = $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['usuario' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();

            // Al loguearse con éxito, va a la ruta 'inicio'
            return redirect()->route('inicio');
        }

        return back()->withErrors([
            'usuario' => "ACCESO DENEGADO: Credenciales no reconocidas."
        ]);
    }

    /* ^ 5. logout() --> Cierre de sesión seguro ^ */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Al salir, lo mandamos a la ruta inicio (verá la landing de nuevo)
        return redirect()->route('inicio');
    }
}
