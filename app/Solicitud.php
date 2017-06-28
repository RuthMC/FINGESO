<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
        'Titulo', 'Texto', 'id_user'
    ];
}
