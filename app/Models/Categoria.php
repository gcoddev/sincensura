<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function publicaciones($id)
    {
        return $publicaciones = Contenido::where('estado', '=', 1)->where('id_categoria', '=', $id)->get();
    }
}
