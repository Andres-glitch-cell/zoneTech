<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Apuntamos a la tabla exacta de tu SQL
    protected $table = 'productos';

    // Definimos los campos que se pueden llenar
    protected $fillable = [
        'nombre',
        'precio',
    ];

    // Tu SQL tiene created_at y updated_at, así que dejamos los timestamps en true
    public $timestamps = true;
}