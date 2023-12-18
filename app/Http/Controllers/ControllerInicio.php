<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Contenido;
use App\Models\Galeria;
use App\Models\Usuario;
use App\Models\Visita;
use Illuminate\Http\Request;

class ControllerInicio extends Controller
{
    public function index(Request $request)
    {
        if (!isset($_COOKIE['visita'])) {
            setcookie('visita', 'visitado', time() + 3600);

            $ip_address = $request->ip();
            $navegador = $_SERVER["HTTP_USER_AGENT"];

            $visita = new Visita;
            $visita->ip_address = $ip_address;
            $visita->navegador = $navegador;
            $visita->save();
        }

        $visitas = Visita::all();
        $categorias = Categoria::where('estado', '=', 1)->get();
        $publicaciones = Contenido::where('estado', '=', 1)->orderBy('id_contenido', 'desc')->paginate(3);
        $publicacionesPopulares = Contenido::where('estado', '=', 1)->orderBy('vistas', 'desc')->limit(3)->get();
        $publicacionPopular = Contenido::where('estado', '=', 1)->orderBy('vistas', 'desc')->first();
        $publicacionesNews = Contenido::where('estado', '=', 1)->orderBy('id_contenido', 'desc')->limit(3)->get();
        $publicacionesAll = Contenido::where('estado', '=', 1)->orderBy('id_contenido', 'desc')->get();
        $imagenes = Galeria::orderBy('id_imagen', 'desc')->limit(6)->get();
        $activo = 0;

        return view('layouts.contenido', compact('visitas', 'categorias', 'publicaciones', 'publicacionesNews', 'publicacionesPopulares', 'publicacionPopular', 'publicacionesAll', 'imagenes', 'activo'));
    }
    public function admin(Request $request)
    {
        $visitas = Visita::all();
        $usuarios = Usuario::where('estado', '=', 1)->get();
        $categorias = Categoria::where('estado', '=', 1)->get();
        $publicaciones = Contenido::where('estado', '=', 1)->get();
        $comentarios = Comentario::all();

        return view('cms.home', compact('visitas', 'usuarios', 'categorias', 'publicaciones', 'comentarios'));
    }
    public function noticia($id)
    {
        if (!isset($_COOKIE['noticia_' . $id])) {
            setcookie('noticia_' . $id, $id, time() + 3600);

            $visto = Contenido::where('id_contenido', '=', $id)->first();
            $visto->update(['vistas' => $visto->vistas + 1]);
        }

        $categorias = Categoria::where('estado', '=', 1)->get();
        $publicacionesAll = Contenido::where('estado', '=', 1)->get();
        $publicacion = Contenido::where('id_contenido', '=', $id)->first();
        $galeria = Galeria::where('id_contenido', '=', $id)->get();

        $publicacionesPopulares = Contenido::where('estado', '=', 1)->orderBy('vistas', 'desc')->limit(3)->get();
        $publicacionesNews = Contenido::where('estado', '=', 1)->orderBy('id_contenido', 'desc')->limit(3)->get();
        $comentarios = Comentario::where('id_contenido', '=', $id)->get();
        $imagenes = Galeria::orderBy('id_imagen', 'desc')->limit(6)->get();
        $activo = -1;

        return view('layouts.publicacion', compact('categorias', 'publicacionesAll', 'publicacionesPopulares', 'publicacion', 'galeria', 'publicacionesNews', 'comentarios', 'imagenes', 'activo'));
    }
    public function categoriaN($id)
    {
        $categorias = Categoria::where('estado', '=', 1)->get();
        $publicacionesAll = Contenido::where('estado', '=', 1)->get();
        $imagenes = Galeria::orderBy('id_imagen', 'desc')->limit(6)->get();
        $publicacionesPopulares = Contenido::where('estado', '=', 1)->orderBy('vistas', 'desc')->limit(3)->get();
        $publicacionesNews = Contenido::where('estado', '=', 1)->orderBy('id_contenido', 'desc')->limit(3)->get();
        $activo = $id;

        $categoria = Categoria::where('id_categoria', '=', $id)->first();
        $publicaciones = Contenido::where('estado', '=', 1)->where('id_categoria', '=', $id)->get();

        return view('layouts.categoria', compact('categoria', 'publicaciones', 'publicacionesPopulares', 'publicacionesNews', 'categorias', 'publicacionesAll', 'imagenes', 'activo'));
    }
}
