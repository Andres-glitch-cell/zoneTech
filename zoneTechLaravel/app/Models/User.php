<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // # Definimos la tabla exacta de tu base de datos
    protected $table = 'usuariosNoAutenticados';

    /**
     * @ Atributos que se pueden asignar masivamente
     * + He añadido 'contraseña_hash', 'rol' e 'iniciales' para que coincida con el Controlador
     */
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
     * ! CONVERSIÓN DE TIPOS (Casts)
     * + Esto soluciona errores de formato de fecha y asegura el hashing
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * 🔑 PROTOCOLO DE AUTENTICACIÓN PERSONALIZADO
     * @ Este método le dice a Laravel: "No busques la columna 'password', usa esta"
     */
    public function getAuthPassword()
    {
        return $this->contraseña_hash;
    }
}
