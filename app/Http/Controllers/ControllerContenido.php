<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerContenido extends Controller
{
    public function index()
    {
        $contenido = Contenido::where('estado', '<>', 2)->orderBy('id_contenido', 'desc')->get();

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
                'titulo' => 'required|max:50',
                'descripcion' => 'max:100',
                'imagen' => 'required',
                'id_categoria' => 'required',
                'contenido_text' => ['required', 'not_in:<div><br></div>'],
            ]);

            $nuevaPublicacion = new Contenido;
            $nuevaPublicacion->titulo = $request->input('titulo');

            $file = $request->file('imagen');
            $name = time() . '.' . $file->extension();
            $file->storeAs('public/publicaciones', $name);
            $nuevaPublicacion->imagen = $name;

            $nuevaPublicacion->id_categoria = $request->input('id_categoria');
            $nuevaPublicacion->descripcion = $request->input('descripcion');
            $nuevaPublicacion->contenido = $request->input('contenido_text');
            $nuevaPublicacion->autor = $request->input('autor') != '' ? $request->input('autor') : Auth::user()->nombres . ' ' . Auth::user()->apellidos;
            $nuevaPublicacion->fuente = $request->input('fuente') != '' ? $request->input('fuente') : null;
            $nuevaPublicacion->id_usuario = Auth::user()->id;
            $nuevaPublicacion->save();

            return redirect()->route('contenido')->with('message', 'Publicacion creada correctamente.');
        } else {
            $validated = $request->validate([
                'titulo' => 'required',
                'id_categoria' => 'required',
                'contenido_text' => 'required',
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
