<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $table = 'visitas';
    protected $primaryKey = 'id_visita';
    protected $fillable = [
        'ip_address',
        'navegador',
    ];
    const CREATED_AT = "creado_el";
    public const UPDATED_AT = null;
}
