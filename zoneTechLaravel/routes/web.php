<?php

/**
 * 🚀 GUÍA DE GIT - TRABAJO EN EQUIPO
 * --------------------------------
 * 1. ACTUALIZAR (Pull):
 * git checkout main
 * git pull origin main
 * git checkout Andres
 * git merge main
 *
 * 2. GUARDAR (Commit):
 * git add .
 * git commit -m "Descripción de los cambios"
 *
 * 3. SUBIR (Push):
 * git push origin Andres
 *
 * 4. FIX .GITIGNORE (Si falla):
 * git rm -r --cached .
 * git add .
 * git commit -m "Limpieza de cache"
 */

use Illuminate\Support\Facades\Route;

/* Ruta principal que carga la vista 'welcome' (significa que tiene el nombre welcome.blade.php)
El "/" quiere decir que esta en localhost, si quisieramos tener archivos en otras carpetas u/o en otras ubicaciones serian por ejemplo /ubicaciones/objetos.blade.php
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/login', function () {
    return view('login');
});

/*
Texto de bienvenida personalizado con fn() =>
 route::get("/", fn() => "<h1>¡Hola! ZoneTech está online 🚀</h1>");
 */
