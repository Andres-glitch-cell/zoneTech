<?php

namespace App\Http\Middleware;

use Closure;
// + Importación necesaria para que VS Code no se pierda
use Illuminate\Support\Facades\Auth;

class CheckRol
{
    public function handle($request, Closure $next, ...$roles)
    {
        // SECURITY: Validación de sesión activa usando la Facade Auth
        // @ ¡IMPORTANTE! Al usar Auth::check(), el error desaparecerá
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // XXX: VALIDACIÓN DE PERMISOS
        // NOTE: Usamos Auth::user() para obtener los datos del usuario logueado
        if (!in_array(Auth::user()->rol, $roles)) {
            return redirect()->route('inicio')->with('error', 'Nivel de autorización insuficiente.');
        }

        return $next($request);
    }
}
