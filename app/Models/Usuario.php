<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'usuario',
        'email',
        'telefono',
        'password',
        'dependencia_id',
        'estado'
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }
}

