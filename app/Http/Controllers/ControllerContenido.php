<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Contenido;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerContenido extends Controller
{
    public function index()
    {
        $contenido = Contenido::where('estado', '<>', 2)->orderBy('id_contenido', 'desc')->get();

        return view('cms.contenido.index', compact('contenido'));
    }
    public function publicacion($id = 0)
    {
        $publicacion = null;
        if ($id != 0) {
            $publicacion = Contenido::where('id_contenido', '=', $id)->first();
        }
        $categorias = Categoria::where('estado', '=', 1)->get();

        return view('cms.contenido.publicacion', compact('categorias', 'publicacion'));
    }
    public function contenidoOne($id)
    {
        $publicacion = Contenido::where('id_contenido', '=', $id)->first();
        $galeria = Galeria::where('id_contenido', '=', $id)->get();
        $comentarios = Comentario::where('id_contenido', '=', $id)->orderBy('id_comentario', 'desc')->get();

        return view('cms.contenido.contenido', compact('publicacion', 'galeria', 'comentarios'));
    }
    public function postImagen(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:50',
            'imagen' => 'required',
            'fuente' => 'max:200',
            'id_contenido' => 'required',
        ]);

        $nuevaImagen = new Galeria;
        $nuevaImagen->titulo = $request->input('titulo');

        $file = $request->file('imagen');
        $name = time() . '.' . $file->extension();
        $file->storeAs('public/galeria', $name);
        $nuevaImagen->imagen = $name;

        $nuevaImagen->fuente = $request->input('fuente') != '' ? $request->input('fuente') : null;
        $nuevaImagen->id_contenido = $request->input('id_contenido');

        $nuevaImagen->save();

        return redirect()->route('contenidoOne', $request->input('id_contenido'))->with('message', 'Imagen agregada correctamente.');
    }
    public function postPublicacion(Request $request, $id = 0)
    {
        $id_contenido = $request->input('id_contenido');

        if ($id == 0 && $id_contenido == 0) {
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

            return redirect()->route('contenidos')->with('message', 'Publicacion creada correctamente.');
        } else {
            $validated = $request->validate([
                'id_contenido' => 'required',
                'titulo' => 'required|max:50',
                'descripcion' => 'max:100',
                'id_categoria' => 'required',
                'contenido_text' => ['required', 'not_in:<div><br></div>'],
            ]);
            $publicacion = Contenido::where('id_contenido', '=', $id_contenido)->first();

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
                'contenido' => $request->input('contenido_text'),
                'autor' => $request->input('autor') != '' ? $request->input('autor') : Auth::user()->nombres . ' ' . Auth::user()->apellidos,
                'fuente' => $request->input('fuente') != '' ? $request->input('fuente') : null,
                'id_categoria' => $request->input('id_categoria'),
            );
            Contenido::where('id_contenido', '=', $id_contenido)->update($data);

            return redirect()->route('contenidos')->with('message', 'Publicacion editada correctamente.');
        }
    }
    public function editar()
    {
        return view('cms.contenido.editar');
    }
    public function eliminarPublicacion(Request $request)
    {
        Contenido::where('id_contenido', '=', $request->input('id_contenido'))->update(['estado' => 2]);

        return redirect()->route('contenidos')->with('message', 'Publicacion eliminada satisfactoriamente.');
    }
    public function cambiarEstado(Request $request)
    {
        if ($request->input('estado') == 1) {
            Contenido::where('id_contenido', '=', $request->input('id_contenido'))->update(['estado' => 0]);
        } elseif ($request->input('estado') == 0) {
            Contenido::where('id_contenido', '=', $request->input('id_contenido'))->update(['estado' => 1]);
        }

        return redirect()->route('contenidos')->with('message', 'Visibilidad actualizada satisfactoriamente.');
    }
}
