<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuariosNoAutenticados';

    // @ ¡IMPORTANTE! Si tu tabla NO tiene las columnas created_at y updated_at, descomenta la siguiente línea:
    // public $timestamps = false;

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

    protected $hidden = [
        'contraseña_hash',
        'remember_token',
    ];

    /**
     * Sobrescribimos para que Laravel Auth sepa dónde está la clave.
     */
    public function getAuthPassword()
    {
        return $this->contraseña_hash;
    }

    // INFO: Si el login te da error de 'password' no encontrado, a veces es necesario 
    // indicarle a Laravel que ignore la columna 'password' por defecto.
}