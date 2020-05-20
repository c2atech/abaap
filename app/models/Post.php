<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo', 'subtitulo', 'descricao','texto', 'autor','tipo', 'imageurl'
    ];

}
