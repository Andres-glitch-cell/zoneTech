<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;

    // Con esto Laravel sabe que debe mirar la tabla 'roles' que creaste en Workbench
    protected $table = 'roles';

    // Como tu PK en Workbench es 'id_rol', hay que avisarle a Laravel (si no, él busca 'id')
    protected $primaryKey = 'id_rol';

    // Estos son los campos que Laravel tiene permiso para escribir
    protected $fillable = [
        'slug', 
        'nombre', 
        'descripcion', 
        'nivel_acceso'
    ];

    // Si en tu tabla de MySQL Workbench NO pusiste las columnas 'created_at' y 'updated_at'
    // Descomenta la línea de abajo (quítale las //) para evitar errores:
    // public $timestamps = false;
}