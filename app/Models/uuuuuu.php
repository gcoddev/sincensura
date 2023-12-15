<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_rol',
        'nombres',
        'apellidos',
        'celular',
        'email',
        'username',
        'password',
        'estado',
        'creado_el',
        'modificado_el',
    ];
    const CREATED_AT = "creado_el";
    const UPDATED_AT = "modificado_el";
}
