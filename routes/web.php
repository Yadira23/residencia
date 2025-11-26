<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\UsuarioController;


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

// Rutas para administrador y dependencia
Route::resource('administradors', AdministradorController::class);

Route::get('/admin/panel', function () {
    return view('administrador.panel');
})->name('admin.panel');



Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('dependencias', DependenciaController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('usuarios', UsuarioController::class)->names('admin.usuarios');
});



Route::get('/admin/panel', [PanelController::class, 'index'])->name('admin.panel');


