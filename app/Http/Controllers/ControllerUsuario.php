<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerUsuario extends Controller
{
    public function index()
    {
        return view('cms.pages.login');
    }
    public function post_login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'), 'estado' => 1])) {
            return back()->with('error', 'Nombre de usuario o contraseña incorrecta.');
        } else {
            return redirect()->intended('admin');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->ajax()) {
            return response()->json(['message' => 'Sesión cerrada con éxito.', 'redirect' => route('login')]);
        } else {
            return redirect()->route('login')->with('message', 'Sesión cerrada con éxito.');
        }
    }
    public function usuarios()
    {
        $usuarios = Usuario::where('estado', '<>', 2)->get();
        $roles = Role::where('estado', '=', 1)->get();

        return view('cms.usuario.index', compact('usuarios', 'roles'));
    }
    public function usuario($id = 0)
    {
        $user = null;
        if ($id != 0) {
            $user = Usuario::where('id', '=', $id)->first();
        }
        $roles = Role::where('estado', '=', 1)->get();

        return view('cms.usuario.usuario', compact('user', 'roles', 'id'));
    }
    public function postUsuario(Request $request)
    {
        $id_user = $request->input('id');

        if ($id_user == 0) {
            $validated = $request->validate([
                'nombres' => 'required|max:50',
                'apellidos' => 'required|max:50',
                'email' => 'max:100',
                'username' => 'required|max:25',
                'id_rol' => 'required',
                'password' => 'required|min:8',
                'confirmar_password' => 'required|same:password',
            ]);
            if ($request->input('celular')) {
                $validated = $request->validate([
                    'celular' => 'numeric|min:7',
                ]);
            }

            $nuevoUsuario = new Usuario;
            $nuevoUsuario->nombres = $request->input('nombres');
            $nuevoUsuario->apellidos = $request->input('apellidos');
            $nuevoUsuario->celular = $request->input('celular');
            $nuevoUsuario->email = $request->input('email');
            $nuevoUsuario->username = $request->input('username');
            $nuevoUsuario->id_rol = $request->input('id_rol');
            $nuevoUsuario->password = bcrypt($request->input('password'));
            $nuevoUsuario->save();

            return redirect()->route('usuarios')->with('message', 'Usuario creado correctamente.');
        } else {
            $validated = $request->validate([
                'nombres' => 'required|max:50',
                'apellidos' => 'required|max:50',
                'email' => 'max:100',
                'username' => 'required|max:25',
                'id_rol' => 'required',
            ]);
            if ($request->input('celular')) {
                $validated = $request->validate([
                    'celular' => 'numeric|min:7',
                ]);
            }
            $password = null;
            if ($request->input('password')) {
                $validated = $request->validate([
                    'password' => 'min:8',
                    'confirmar_password' => 'required|same:password',
                ]);
                $password = bcrypt($request->input('password'));
            }
            
            $editarUsuario = Usuario::where('id', '=', $id_user)->first();
            $editarUsuario->nombres = $request->input('nombres');
            $editarUsuario->apellidos = $request->input('apellidos');
            $editarUsuario->celular = $request->input('celular');
            $editarUsuario->email = $request->input('email');
            $editarUsuario->username = $request->input('username');
            $editarUsuario->id_rol = $request->input('id_rol');
            if ($password != null) {
                $editarUsuario->password = $password;
            }
            $editarUsuario->save();

            return redirect()->route('usuarios')->with('message', 'Usuario modificado correctamente.');
        }
    }
}
