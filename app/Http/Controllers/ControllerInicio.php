<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Contenido;
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
        $publicaciones = Contenido::where('estado', '=', 1)->paginate(3);
        $publicacionesNews = Contenido::where('estado', '=', 1)->limit(3)->get();
        $publicacionesAll = Contenido::where('estado', '=', 1)->get();

        return view('inicio', compact('visitas', 'categorias', 'publicaciones', 'publicacionesNews', 'publicacionesAll'));
    }
    public function admin(Request $request)
    {
        // if (!isset($_COOKIE['visita'])) {
        //     setcookie('visita', 'visitado', time() + 3600);

        //     $ip_address = $request->ip();
        //     $navegador = $_SERVER["HTTP_USER_AGENT"];

        //     $visita = new Visita;
        //     $visita->ip_address = $ip_address;
        //     $visita->navegador = $navegador;
        //     $visita->save();
        // }

        $visitas = Visita::all();
        $usuarios = Usuario::where('estado', '=', 1)->get();
        $categorias = Categoria::where('estado', '=', 1)->get();
        $publicaciones = Contenido::where('estado', '=', 1)->get();
        $comentarios = Comentario::all();

        return view('cms.home', compact('visitas', 'usuarios', 'categorias', 'publicaciones', 'comentarios'));
    }
}
