<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

<<<<<<< HEAD
    // 1. Apuntamos a tu tabla del .sql
    protected $table = 'usuariosNoAutenticados';

    // 2. Campos que se pueden llenar (Fillable)
=======
    protected $table = 'usuariosNoAutenticados';

    // @ ¡IMPORTANTE! Si tu tabla NO tiene las columnas created_at y updated_at, descomenta la siguiente línea:
    // public $timestamps = false;

>>>>>>> cae9bc15bf2ff6b953d961690fd8acf6824ef838
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

<<<<<<< HEAD
    // 3. Importante: Laravel necesita saber cuál es la columna de la contraseña
=======
    protected $hidden = [
        'contraseña_hash',
        'remember_token',
    ];

    /**
     * Sobrescribimos para que Laravel Auth sepa dónde está la clave.
     */
>>>>>>> cae9bc15bf2ff6b953d961690fd8acf6824ef838
    public function getAuthPassword()
    {
        return $this->contraseña_hash;
    }

<<<<<<< HEAD
    // Desactivamos los timestamps si tu SQL usa fecha_creacion manualmente
    public $timestamps = true; 
=======
    // INFO: Si el login te da error de 'password' no encontrado, a veces es necesario 
    // indicarle a Laravel que ignore la columna 'password' por defecto.
>>>>>>> cae9bc15bf2ff6b953d961690fd8acf6824ef838
}