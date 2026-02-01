<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Usuario
 */

// ! Sin este archivo, para sacar un usuario tendrías que escribir: SELECT * FROM usuarios WHERE id = 1; (SQL puro)
// & Gracias a este archivo (el Modelo), en Laravel solo tendrás que escribir: $user = Usuario::find(1); (Mucho más limpio y rápido).
class Usuario extends Model
{
    // 1. Decirle a Laravel cómo se llama la tabla (porque no es 'users')
    protected $table = 'usuarios';

    // 2. Si no tienes las columnas 'created_at' y 'updated_at' en SQL, desactívalas
    public $timestamps = false;

    // 3. Los campos que el Backend tiene permiso para escribir
    protected $fillable = [
        'dni',
        'nombre',
        'apellidoUno',
        'apellidoDos',
        'pais',
        'ciudad',
        'poblacion',
        'codigoPostal',
        'direccion',
        'email',
        'telefono',
        'contraseña_hash',
        'fecha_nacimiento',
        'rol'
    ];

    // 4. Ocultar la contraseña para que no se envíe por error a la web
    protected $hidden = [
        'contraseña_hash',
    ];
}
