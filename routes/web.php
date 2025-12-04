<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DepenController;


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



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('dependencias', DependenciaController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('usuarios', UsuarioController::class)->names('admin.usuarios');
});

Route::get('/admin/panel', [PanelController::class, 'index'])->name('admin.panel');


/////////////////////////////////////////////////////////  DEPENDENCIAS  ///////////////////////////////////////////////////////////////////////////////////////


// Sección para usuarios de DEPENDENCIA (sin login por ahora)
Route::prefix('dependencia')->group(function () {
    Route::get('/panel/{id}', [DepenController::class, 'panel'])
        ->name('dependencia.panel');


    Route::get('/subir/{id}', [DepenController::class, 'subir'])->name('dependencia.subir');

    Route::post('/subir/{id}', [DepenController::class, 'subirSave'])
    ->name('dependencia.subir.save');


    Route::get('/archivos/{id}', [DepenController::class, 'lista'])
     ->name('dependencia.lista');


    Route::get('/perfil', [App\Http\Controllers\DepenController::class, 'perfil'])
        ->name('dependencia.perfil');
});
