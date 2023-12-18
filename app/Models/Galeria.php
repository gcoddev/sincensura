<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;
    protected $table = 'galeria';
    protected $primaryKey = 'id_imagen';
    protected $fillable = [
        'titulo',
        'imagen',
        'video_url',
        'fuente',
        'id_contenido',
    ];
    const CREATED_AT = "fecha";
    const UPDATED_AT = null;
}
