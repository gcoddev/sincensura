<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;
    protected $table = 'contenido';
    protected $primaryKey = 'id_categoria';
    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'contenido',
        'estado',
        'creado_el',
        'modificado_el',
        'id_usuario',
        'id_categoria',
        'autor',
        'fuente',
        'vistas',
    ];
    const CREATED_AT = "creado_el";
    const UPDATED_AT = "modificado_el";

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }
    public function comentario($id)
    {
        return Comentario::where('id_contenido', '=', $id)->get();
    }

}
