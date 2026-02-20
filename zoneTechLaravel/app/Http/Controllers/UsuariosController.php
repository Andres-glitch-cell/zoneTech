<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    /**
     * 1. showInicio()
     * Muestra SIEMPRE la landing de la RTX 5090 (inicio.blade.php)
     */
    public function showInicio()
    {
        // Eliminamos el IF que redirigía automáticamente.
        // Ahora todos ven la landing al pulsar "Pantalla Principal".
        return view('inicio');
    }

    /**
     * 2. store() --> Registro de Identidad
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario'   => 'required|string|max:50|unique:usuariosNoAutenticados,usuario',
            'email'     => 'required|email|unique:usuariosNoAutenticados,email',
            'nombre'    => 'required|string|max:100',
            'apellido1' => 'required|string|max:150',
            'apellido2' => 'nullable|string|max:150',
            'password'  => 'required|min:8|confirmed',
        ]);

        try {
            $iniciales = strtoupper(substr($validated['nombre'], 0, 1) . substr($validated['apellido1'], 0, 1));

            $user = User::create([
                'usuario'         => $validated['usuario'],
                'email'           => $validated['email'],
                'nombre'          => $validated['nombre'],
                'apellido1'       => $validated['apellido1'],
                'apellido2'       => $validated['apellido2'] ?? '',
                'contraseña_hash' => Hash::make($validated['password']),
                'iniciales'       => $iniciales,
                'rol'             => 'usuario',
            ]);

            Auth::login($user);
            $request->session()->regenerate();

            // Tras registrarse, va al panel de las dos opciones
            return redirect()->route('usuario.dashboard');
        } catch (\Exception $e) {
            Log::error("Fallo en registro ZoneTech: " . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Error en el despliegue.']);
        }
    }

    /**
     * 3. loginPost() --> Protocolo de Acceso
     */
    public function loginPost(Request $request)
    {
        $credenciales = $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['usuario' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();
            // Tras el login, va al panel de las dos opciones
            return redirect()->route('usuario.dashboard');
        }

        return back()->withInput()->withErrors([
            'usuario' => "Acceso denegado. Credenciales no reconocidas."
        ]);
    }

    /**
     * 4. logout()
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('inicio');
    }

    /**
     * 5. dashboard()
     * Este es el panel con las dos tarjetas (Ir a Productos / Ir a Pantalla Principal)
     */
    public function dashboard()
    {
        return view('Usuario.inicioAutenticado');
    }
}
