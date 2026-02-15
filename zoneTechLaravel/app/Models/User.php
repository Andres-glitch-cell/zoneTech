<?php
 // ^ Indica que este archivo vive en la carpeta de Modelos ^
namespace App\Models;

// Importamos las herramientas de Laravel para que este archivo sepa ser un "Usuario"
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    // HasFactory: Permite crear usuarios de prueba rápidamente
    // Notifiable: Permite que este usuario reciba emails (como recuperar contraseña)
    use HasFactory, Notifiable;

    /**
     * 1. NOMBRE DE LA TABLA
     * Por defecto Laravel busca "users".
     * Con esto le obligamos a que mire en tu tabla de MySQL llamada "usuarios".
     */
    protected $table = 'usuariosNoAutenticados';

    /**
     * 2. LA "LISTA BLANCA" (Fillable)
     * Estos son los únicos campos que Laravel tiene permiso para escribir
     * automáticamente. Si intentas guardar algo que no esté aquí, Laravel
     * lo ignorará por seguridad (para evitar que alguien hackee tu formulario).
     */
    protected $fillable = [
        'usuario',
    'nombre',
    'apellido1',
    'apellido2',
    'email',
    'contraseña_hash',
    'rol'
    ];

    /**
     * 3. EL TRADUCTOR DE CONTRASEÑAS
     * Laravel busca siempre la columna "password" para el login.
     * Como tú la llamaste "contraseña_hash", esta función le dice:
     * "Oye, cuando valides el login, usa esta columna en vez de la de por defecto".
     */
    public function getAuthPassword()
    {
        return $this->contraseña_hash;
    }

    /**
     * 4. CAMPOS INVISIBLES (Hidden)
     * Cuando pides datos de un usuario (por ejemplo, para mandarlos a la web),
     * estas columnas NUNCA se enviarán. Es por seguridad, para que nadie
     * vea el hash de la contraseña ni el token de sesión.
     */
    protected $hidden = [
        'contraseña_hash',
        'remember_token',
    ];

    /**
     * 5. LOS "CASTS" (Transformadores)
     * Le dice a Laravel cómo tratar los datos al leerlos o guardarlos:
     * - email_verified_at: Lo convierte en un objeto de fecha (Carbon) fácil de usar.
     * - contraseña_hash => hashed: ESTO ES CLAVE. Le dice a Laravel que guarde
     * la contraseña siempre encriptada (bcrypt) automáticamente.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'contraseña_hash' => 'hashed',
        ];
    }

    public function getInicialesAttribute()
{
    return strtoupper(mb_substr($this->nombre, 0, 1) . mb_substr($this->apellido1, 0, 1));
}
}
