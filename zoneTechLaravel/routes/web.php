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

Route::get('/', function () {
    return view('welcome');
});

/*
! Texto de bienvenida personalizado con fn() => 
 route::get("/", fn() => "<h1>¡Hola! ZoneTech está online 🚀</h1>");
 */


?>