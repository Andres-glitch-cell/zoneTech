<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // 1. Apuntamos a tu tabla del .sql
    protected $table = 'usuariosNoAutenticados';

    // 2. Campos que se pueden llenar (Fillable)
    protected $fillable = [
        'usuario', 
        'nombre', 
        'apellido1', 
        'apellido2', 
        'email', 
        'contraseña_hash', 
        'iniciales', 
        'rol'
    ];

    // 3. Importante: Laravel necesita saber cuál es la columna de la contraseña
    public function getAuthPassword()
    {
        return $this->contraseña_hash;
    }

    // Desactivamos los timestamps si tu SQL usa fecha_creacion manualmente
    public $timestamps = true; 
}