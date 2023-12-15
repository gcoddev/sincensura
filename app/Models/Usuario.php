<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    protected $hidden = [
        'password',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
