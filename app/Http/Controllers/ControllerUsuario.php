<?php

namespace App\Http\Controllers;

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
}
