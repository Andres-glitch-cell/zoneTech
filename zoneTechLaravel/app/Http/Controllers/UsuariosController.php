<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{

    /* ^ 1. index() --> "Saca" a los usuarios que tiene User::all() ^ */
    public function index()
    {
        $usuarios = User::all();
        // Asegúrate de tener esta vista creada o cámbiala por la tuya
        return view('usuarios.index', compact('usuarios'));
    }

 /* ^ 2. store(Request $request) --> Resumen: Verifíca si todos los campos son correctos ^ */
    public function store(Request $request)
    {
        // ! 2.1 Validamos los datos de la captura de pantalla
        $request->validate([
            'usuario'  => 'required|unique:usuarios,dni', // 'usuario' en HTML -> 'dni' en BD
            'email'    => 'required|email|unique:usuarios,email',
            'nombre'   => 'required|string',
            'apellido' => 'required|string',
            'password' => 'required|min:8',
        ]);

        // ! 2.2 Creamos el registro en MySQL
        User::create([
            'dni'             => $request->usuario,
            'nombre'          => $request->nombre,
            'apellido1'       => $request->apellido,
            'email'           => $request->email,
            'contraseña_hash' => $request->password,  // [IMPORTANT] El Modelo se encarga de cifrarla
            'rol'             => 'cliente',
            'pais'            => 'España', // [IMPORTANT] Rellenamos campos obligatorios de tu migración para que no de error
            'ciudad'          => 'No definida',
            'poblacion'       => 'No definida',
            'codigoPostal'    => 0,
            'direccion'       => 'No definida',
        ]);

      return redirect()->route('login')->with('success', "IDENTIDAD ESTABLECIDA: El usuario {$request->usuario} ha sido registrado en el sistema.");
    }


 /* ^ 3. loginPost(Request $request) -->  ^ */
    public function loginPost(Request $request)
    {
        // ! 3.1 Valida inputs
        $credenciales = $request->validate([
            'usuario'  => 'required',
            'password' => 'required',
        ]);

        // ! 3.1 Intentar autenticar (Comprueba si 'usuario' tiene el DNI correcto de ese mismo usuario --> 'dni')
        if (Auth::attempt(['dni' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();
            /*
             NOTA IMPORTANTE SOBRE $request->session()-->regenerate()
            & Cuando alguien inicia sesión, Laravel borra el ID de la sesión antigua y genera uno nuevo totalmente distinto. ¿Por qué? Para evitar ataques de "Fijación de Sesión", donde un hacker podría intentar robar una sesión abierta antes de que te identifiques. Es como cambiar la cerradura justo en el momento en que entras a casa.
            */
            return redirect()->intended('inicio'); // [IMPORTANT] Te manda a /inicio si todo va bien
        }

 /* ^ 3. loginPost(Request $request) -->  ^ */
        return back()->withErrors([
            'usuario' => "Credenciales Incorrectas"
        ]);
    }
}
