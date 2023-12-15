<?php

use App\Http\Controllers\ControllerCategoria;
use App\Http\Controllers\ControllerContenido;
use App\Http\Controllers\ControllerInicio;
use App\Http\Controllers\ControllerUsuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [ControllerInicio::class, 'index'])->name('inicio');
Route::get('/login', [ControllerUsuario::class, 'index'])->name('login');
Route::post('/login', [ControllerUsuario::class, 'post_login'])->name('post_login');

Route::prefix('admin')->middleware('usuario_autenticado')->group(function () {
    Route::get('/', [ControllerInicio::class, 'admin'])->name('admin');

    Route::get('/categoria', [ControllerCategoria::class, 'index'])->name('categoria');

    Route::get('/contenido', [ControllerContenido::class, 'index'])->name('contenido');
    Route::get('/publicacion', [ControllerContenido::class, 'publicacion'])->name('publicacion');
    Route::post('/publicacion', [ControllerContenido::class, 'postPublicacion'])->name('publicacion');

    Route::post('/logout', [ControllerUsuario::class, 'logout'])->name('logout');
});
