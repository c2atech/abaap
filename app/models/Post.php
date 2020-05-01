<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo', 'sub-titulo', 'descricao','texto', 'autor', ' image-url'
    ];

}
