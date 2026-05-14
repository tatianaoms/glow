<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    // Añade esto para permitir guardar el título, contenido y categoría
    protected $fillable = ['title', 'content', 'category'];

    public $timestamps = true;
}
