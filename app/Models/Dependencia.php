<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable = [
        'nombre',
        'sector',
        'email',
        'extension',
        'telefono',
        'direccion',
    ];
}

