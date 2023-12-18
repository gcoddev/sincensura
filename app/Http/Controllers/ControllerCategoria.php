<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class ControllerCategoria extends Controller
{
    public function index()
    {
        $categorias = Categoria::where('estado', '<>', 2)->get();

        return view('cms.categoria.index', compact('categorias'));
    }
    public function postCategoria(Request $request)
    {
        $id_categoria = $request->input('id_categoria');

        if ($id_categoria == 0) {
            $validated = $request->validate([
                'nombre' => 'required|max:10',
                'descripcion' => 'max:100',
            ]);

            $nuevaCategoria = new Categoria;
            $nuevaCategoria->nombre = $request->input('nombre');
            $nuevaCategoria->descripcion = $request->input('descripcion');

            $nuevaCategoria->save();

            return redirect()->route('categoria')->with('message', 'Categoria agregada correctamente.');
        } else {
            $validated = $request->validate([
                'nombre' => 'required|max:10',
                'descripcion' => 'max:100',
            ]);

            $data = array(
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
            );

            Categoria::where('id_categoria', '=', $id_categoria)->update($data);

            return redirect()->route('categoria')->with('message', 'Categoria editada correctamente.');
        }
    }
    public function eliminarCategoria(Request $request)
    {
        Categoria::where('id_categoria', '=', $request->input('id_categoria'))->update(['estado' => 2]);

        return redirect()->route('categoria')->with('message', 'Categoria eliminada satisfactoriamente.');
    }
    public function cambiarEstado(Request $request)
    {
        if ($request->input('estado') == 1) {
            Categoria::where('id_categoria', '=', $request->input('id_categoria'))->update(['estado' => 0]);
        } elseif ($request->input('estado') == 0) {
            Categoria::where('id_categoria', '=', $request->input('id_categoria'))->update(['estado' => 1]);
        }

        return redirect()->route('categoria')->with('message', 'Visibilidad actualizada satisfactoriamente.');
    }
}
