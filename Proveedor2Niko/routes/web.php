<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AdminController;
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

Route::get('/Productos/gestionar', [ProductoController::class, 'index']);

Route::post('/articulos/guardarArticulo', [ProductoController::class, 'store']);


Route::get('/Categorias/gestionar', [CategoriaController::class, 'index']);

Route::get('/principal', [PrincipalController::class, 'index']);

Route::get('/Login', function () {
    return view('adminLogin');
});


Route::post('/iniciar', [AdminController::class, 'iniciar']);
