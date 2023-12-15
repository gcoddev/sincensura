<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contenido;
use Illuminate\Http\Request;

class ControllerContenido extends Controller
{
    public function index()
    {
        $contenido = Contenido::where('estado', '=', 1)->orderBy('id_contenido', 'desc')->get();

        return view('cms.contenido.index', compact('contenido'));
    }
    public function publicacion()
    {
        $categorias = Categoria::where('estado', '=', 1)->get();

        return view('cms.contenido.publicacion', compact('categorias'));
    }
    public function postPublicacion(Request $request)
    {
        $id = $request->input('id_contenido');

        if (!$id) {
            $validated = $request->validate([
                'titulo' => 'required',
                'imagen' => 'required',
                'descripcion' => 'required',
                'id_categoria' => 'required',
            ]);

            $nuevaPublicacion = new Contenido;
            $nuevaPublicacion->titulo = $request->input('titulo');

            $file = $request->file('imagen');
            $name = time() . '.' . $file->extension();
            $file->storeAs('public/publicaciones', $name);
            $nuevaPublicacion->imagen = $name;

            $nuevaPublicacion->descripcion = $request->input('descripcion');
            $nuevaPublicacion->id_categoria = $request->input('id_categoria');
            $nuevaPublicacion->id_usuario = 1;
            $nuevaPublicacion->save();

            return redirect()->route('contenido')->with('message', 'Publicacion creada correctamente.');
        } else {
            $validated = $request->validate([
                'titulo' => 'required',
                'descripcion' => 'required',
                'id_categoria' => 'required',
            ]);
            $publicacion = Contenido::where('id_contenido', '=', $id)->first();

            $imagen = $publicacion->imagen;
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $name = time() . '.' . $file->extension();
                $file->storeAs('public/publicaciones', $name);

                $imagen = $name;
            }

            $data = array(
                'titulo' => $request->input('titulo'),
                'imagen' => $imagen,
                'descripcion' => $request->input('descripcion'),
                'id_categoria' => $request->input('id_categoria'),
                'id_usuario' => 1,
            );
            $publicacion->update($data);

            return redirect()->route('contenido')->with('message', 'Publicacion editada correctamente.');
        }
    }
    public function editar()
    {
        return view('cms.contenido.editar');
    }
    public function eliminar()
    {
        //
    }
}
