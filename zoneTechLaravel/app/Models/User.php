<?php

namespace App\Models;

/**
 * AUTHOR: Andres
 * # Referencia: Tabla 'usuariosNoAutenticados' en zoneTech.sql
 * & Nota especial: Este modelo sobreescribe el comportamiento por defecto de Laravel Auth
 */

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /*
    |--------------------------------------------------------------------------
    | 🔋 CONFIGURACIÓN DE NÚCLEO
    |--------------------------------------------------------------------------
    */

    // @ ¡IMPORTANTE! Se vincula el modelo a la tabla específica del SQL oficial
    protected $table = 'usuariosNoAutenticados';

    // + Campos habilitados para asignación masiva (Mass Assignment)
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

    /*
    |--------------------------------------------------------------------------
    | 🔒 PROTOCOLO DE SEGURIDAD (AUTH OVERRIDE)
    |--------------------------------------------------------------------------
    | SECURITY: Laravel busca por defecto la columna 'password'.
    | HOW: Se utiliza este método para redirigir la validación a 'contraseña_hash'.
    */

    // OVERRIDE: Indica a Laravel qué columna usar para las credenciales
    public function getAuthPassword()
    {
        return $this->contraseña_hash;
    }

    /*
    |--------------------------------------------------------------------------
    | ⏳ GESTIÓN DE TIEMPOS
    |--------------------------------------------------------------------------
    | NOTE: Sincronizado con 'created_at' y 'updated_at' del SQL oficial.
    | ! Advertencia: Si se cambia a false, el sistema dejará de registrar fechas.
    */
    public $timestamps = true;
}
