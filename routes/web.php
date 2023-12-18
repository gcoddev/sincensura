<?php

use App\Http\Controllers\ControllerCategoria;
use App\Http\Controllers\ControllerComentario;
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
Route::get('/noticia/{id}', [ControllerInicio::class, 'noticia'])->name('noticia');
Route::get('/categoria/{id}', [ControllerInicio::class, 'categoriaN'])->name('categoriaN');
Route::post('/comentario/{id}', [ControllerComentario::class, 'comentar'])->name('comentario');

Route::get('/login', [ControllerUsuario::class, 'index'])->name('login')->middleware('usuario_no_autenticado');
Route::post('/login', [ControllerUsuario::class, 'post_login'])->name('post_login');

Route::prefix('admin')->middleware('usuario_autenticado')->group(function () {
    Route::get('/', [ControllerInicio::class, 'admin'])->name('admin');

    Route::get('/usuarios', [ControllerUsuario::class, 'usuarios'])->name('usuarios');
    Route::get('/usuario/{id?}', [ControllerUsuario::class, 'usuario'])->name('usuario');
    Route::post('/usuario', [ControllerUsuario::class, 'postUsuario'])->name('post_usuario');

    Route::get('/category', [ControllerCategoria::class, 'index'])->name('categoria');
    Route::post('/category', [ControllerCategoria::class, 'postCategoria'])->name('post_categoria');
    Route::post('/categoryD', [ControllerCategoria::class, 'eliminarCategoria'])->name('eliminarCategoria');
    Route::post('/categoryS', [ControllerCategoria::class, 'cambiarEstado'])->name('cambiarEstadoC');

    Route::get('/contenidos', [ControllerContenido::class, 'index'])->name('contenidos');
    Route::get('/publicacion/{id?}', [ControllerContenido::class, 'publicacion'])->name('publicacion');
    Route::post('/publicacion', [ControllerContenido::class, 'postPublicacion'])->name('publicacion');
    Route::post('/publicacionD', [ControllerContenido::class, 'eliminarPublicacion'])->name('eliminarPublicacion');
    Route::post('/publicacionS', [ControllerContenido::class, 'cambiarEstado'])->name('cambiarEstado');

    Route::get('/contenido/{id}', [ControllerContenido::class, 'contenidoOne'])->name('contenidoOne');
    Route::post('/imagen', [ControllerContenido::class, 'postImagen'])->name('post_imagen');

    Route::post('/logout', [ControllerUsuario::class, 'logout'])->name('logout');
});
