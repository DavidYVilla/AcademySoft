<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>['auth']], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //rutas para usuarios
     Route::get('/usuarios/listar', [App\Http\Controllers\HomeController::class, 'listaUsuarios']);
     Route::get('/usuarios/create', [App\Http\Controllers\HomeController::class, 'crearUsuario']);
     Route::post('/usuarios/registrar', [App\Http\Controllers\HomeController::class, 'store']);
     Route::get('/usuarios/elimina/{id}', [App\Http\Controllers\HomeController::class, 'elimina']);

     //rutas para cursos
    Route::get('/cursos/index', [App\Http\Controllers\CursoController::class, 'index']);
    Route::get('/cursos/registrar', [App\Http\Controllers\CursoController::class, 'create']);
    Route::post('/cursos/registrar', [App\Http\Controllers\CursoController::class, 'store']);
    Route::get('/cursos/actualizar/{id}', [App\Http\Controllers\CursoController::class, 'edit']);
    Route::put('/cursos/actualizar/{id}', [App\Http\Controllers\CursoController::class, 'update']);
    Route::get('/cursos/estado/{id}', [App\Http\Controllers\CursoController::class, 'estado']);
    Route::get('/cursos/ver/{id}', [App\Http\Controllers\CursoController::class, 'show']);
});
