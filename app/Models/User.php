<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function dependencia()
{
    return $this->belongsTo(Dependencia::class);
}

protected $fillable = [
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'usuario',
    'email',
    'telefono',
    'password',
    'estado',
    'dependencia_id',
];


    protected $hidden = [
        'password',
        'remember_token',
    ];

   


}
