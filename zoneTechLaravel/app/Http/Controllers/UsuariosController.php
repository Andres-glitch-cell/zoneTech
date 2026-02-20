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
     * Muestra la landing principal.
     */
    public function showInicio()
    {
        return view('inicio');
    }

    /**
     * 2. store() --> Registro corregido para procesar nombres y apellidos
     */
    public function store(Request $request)
    {
        // + Añadimos todos los campos del formulario a la validación
        $validated = $request->validate([
            'usuario'   => 'required|string|max:50|unique:usuariosNoAutenticados,usuario',
            'email'     => 'required|email|unique:usuariosNoAutenticados,email',
            'nombre'    => 'required|string|max:100',
            'apellido1' => 'required|string|max:100',
            'apellido2' => 'nullable|string|max:100', // Nullable por si solo tiene un apellido
            'rol'       => 'required|in:cliente,tecnico,administrador',
            'password'  => 'required|min:8|confirmed',
        ]);

        try {
            // Generamos las iniciales dinámicamente: 1ª letra nombre + 1ª letra apellido
            $iniciales = strtoupper(substr($validated['nombre'], 0, 1) . substr($validated['apellido1'], 0, 1));

            $user = User::create([
                'usuario'         => $validated['usuario'],
                'email'           => $validated['email'],
                'nombre'          => $validated['nombre'],
                'apellido1'       => $validated['apellido1'],
                'apellido2'       => $validated['apellido2'] ?? '',
                'rol'             => $validated['rol'],
                'contraseña_hash' => Hash::make($validated['password']),
                'iniciales'       => $iniciales,
            ]);

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('usuario.dashboard')
                ->with('success', 'Identidad ZoneTech creada correctamente.');

        } catch (\Exception $e) {
            // ! Error crítico: Logueamos el mensaje real para debug
            Log::error("Fallo en registro: " . $e->getMessage());
            
            return back()->withInput()->withErrors([
                'error' => 'Error en el despliegue: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * 3. loginPost() --> Autenticación por Email + Rol
     */
    public function loginPost(Request $request)
    {
        $credenciales = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'rol'      => 'required|in:cliente,tecnico,administrador',
        ]);

        // Intentamos autenticar con la lógica personalizada del modelo User
        if (Auth::attempt([
            'email'    => $credenciales['email'], 
            'password' => $credenciales['password'], 
            'rol'      => $credenciales['rol']
        ])) {
            
            $request->session()->regenerate();
            
            return redirect()->route('usuario.dashboard')
                ->with('success', 'Acceso concedido al Nodo: ' . strtoupper($credenciales['rol']));
        }

        return back()->withInput()->withErrors([
            'email' => "Las credenciales o el rango de acceso no son válidos."
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
     */
    public function dashboard()
    {
        return view('Usuario.inicioAutenticado', [
            'usuario' => Auth::user()
        ]);
    }
}