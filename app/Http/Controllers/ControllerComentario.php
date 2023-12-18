<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ControllerComentario extends Controller
{
    public function comentar(Request $request, $id)
    {
        $validated = $request->validate([
            'alias' => 'required|max:15',
            'comentario' => 'required|min:10',
        ]);
        $nuevoComentario = new Comentario;
        $nuevoComentario->alias = $request->input('alias');
        $nuevoComentario->comentario = $request->input('comentario');
        $nuevoComentario->ip_address = $request->ip();
        $nuevoComentario->id_contenido = $id;

        $malo = false;
        $palabrasProhibidas = array('cojud', 'mierd', 'caraj', 'estupid', 'pelotud', 'perr', 'malnacid', 'malparid', 'negr');
        foreach ($palabrasProhibidas as $palabra) {
            if (str_contains($request->input('comentario'), $palabra)) {
                $malo = true;
                break;
            }
        }
        if ($malo) {
            $nuevoComentario->estado = 0;
        } else {
            $nuevoComentario->estado = 1;
        }
        $nuevoComentario->save();

        return redirect()->route('noticia', $id)->with('message', 'Gracias por su opinion.');
    }
}
