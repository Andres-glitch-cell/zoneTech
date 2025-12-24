<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
! Texto de bienvenida personalizado con fn() => 
 route::get("/", fn() => "<h1>¡Hola! ZoneTech está online 🚀</h1>");
 */