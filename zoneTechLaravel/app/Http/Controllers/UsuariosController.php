<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // + Necesario para encriptar contraseñas

class UsuariosController extends Controller
{
    /**
     * ^ 1. showInicio() ^
     * Gestiona la vista según el estado de la sesión.
     */
    public function showInicio()
    {
        if (Auth::check()) {
            return view('inicioAutenticado');
        }
        return view('inicio');
    }

    /**
     * ^ 2. index() ^
     * Lista de expedientes (Admin/Control).
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * ^ 3. store() --> Registro de Identidad ^
     * + Corregido: Encriptación y Mapeo de campos.
     */
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
            // & Generamos iniciales automáticamente para el perfil (Ej: "AF")
            $iniciales = strtoupper(substr($request->nombre, 0, 1) . substr($request->apellido1, 0, 1));

            $user = User::create([
                'usuario'         => $request->usuario,
                'email'           => $request->email,
                'nombre'          => $request->nombre,
                'apellido1'       => $request->apellido1,
                'apellido2'       => $request->apellido2,
                'contraseña_hash' => Hash::make($request->password), // ! ENCRIPTADO
                'iniciales'       => $iniciales,
                'rol'             => 'usuario',
            ]);

            Auth::login($user);

            return redirect()->route('inicio');

        } catch (\Exception $e) {
            // @ Revisar si 'contraseña_hash' y 'iniciales' están en $fillable en el Modelo
            dd("FALLO CRÍTICO EN EL REGISTRO: " . $e->getMessage());
        }
    }

    /**
     * ^ 4. loginPost() --> Protocolo de Acceso ^
     */
    public function loginPost(Request $request)
    {
        $credenciales = $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required',
        ]);

        // # Laravel usará automáticamente 'contraseña_hash' gracias al método getAuthPassword() del modelo
        if (Auth::attempt(['usuario' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();
            return redirect()->route('inicio');
        }

        return back()->withErrors([
            'usuario' => "ACCESO DENEGADO: Credenciales no reconocidas en la base de datos."
        ]);
    }

    /**
     * ^ 5. logout() --> Desconexión del Sistema ^
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }
}
