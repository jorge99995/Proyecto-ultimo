<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "usuarios";
    protected $fillable = [
        'usu_nombres', 'email', 'usu_apellidos', 'usu_telefono', 'usu_contraseña'
    ];

    public $timestamps = false;
}
