<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; // Importante para el manejo de hashes

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuariosNoAutenticados';

    // Laravel por defecto busca 'id'. Si tu PK tiene otro nombre, añádelo aquí:
    // protected $primaryKey = 'id_usuario'; 

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

    /**
     * Atributos que deben ocultarse en serialización.
     */
    protected $hidden = [
        'contraseña_hash',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // 'contraseña_hash' => 'hashed', // Solo si usas Laravel 10+
    ];

    /**
     * Sobrescribimos el nombre de la columna de contraseña para Laravel Auth.
     */
    public function getAuthPassword()
    {
        return $this->contraseña_hash;
    }
}