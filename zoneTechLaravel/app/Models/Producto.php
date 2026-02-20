<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // * Campos que se pueden guardar/editar desde el controlador
    protected $fillable = [
        'nombre',
        'precio',
    ];
}
