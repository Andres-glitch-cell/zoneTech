<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle($request, \Closure $next, ...$roles)
{
    // 1. Si no está logueado, fuera
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    // 2. Si su rol no está en la lista de permitidos, fuera
    if (!in_array(auth()->user()->rol, $roles)) {
        return redirect()->route('inicio')->with('error', 'Nivel de autorización insuficiente.');
    }

    return $next($request);
}
}
