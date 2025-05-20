<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventosAdalaController;
use App\Http\Controllers\Usuarios;
use App\Http\Controllers\UsuariosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/sobreNosotros', 'sobreNosotros')->name('sobreNosotros');
    Route::get('/contacto', 'contacto')->name('contacto');
    Route::get('/objetivos', 'objetivos')->name('objetivos');
    Route::get('/porQueAdala', 'porQueAdala')->name('porQueAdala');
    Route::get('/documentos', 'documentos')->name('documentos');
});
Route::controller(EventosAdalaController::class)->group(function () {
    Route::get('dashboard/eventos', 'index')->name('eventos');
    Route::get('dashboard/eventos/create', 'create')->name('crearEvento');
    Route::post('dashboard/eventos', 'store')->name('eventos.store');
    Route::get('dashboard/eventos/ver/{evento}', 'show')->name('verEvento');
    Route::get('dashboard/eventos/{evento}/edit', 'edit')->name('editarEvento');
    Route::put('dashboard/eventos/{evento}', 'update')->name('actualizarEvento');
    Route::delete('dashboard/eventos/{evento}/borrar', 'destroy')->name('borrarEvento');
    Route::post('dashboard/eventos/{evento}/recuperar', 'recuperar')->name('recuperarEvento');
})->middleware('auth');

Route::controller(UsuariosController::class)->group(function () {
    Route::get('dashboard/usuarios', 'index')->name('usuarios');
    Route::get('dashboard/usuarios/create', 'create')->name('crearUsuario');
    Route::post('dashboard/usuarios', 'store')->name('usuarios.store');
    Route::get('dashboard/usuarios/ver/{usuario}', 'show')->name('verUsuario');
    Route::get('dashboard/usuarios/{usuario}/edit', 'edit')->name('editarUsuario');
    Route::put('dashboard/usuarios/{usuario}', 'update')->name('actualizarUsuario');
    Route::delete('dashboard/usuarios/{usuario}/borrar', 'destroy')->name('borrarUsuario');
})->middleware('admin');

require __DIR__ . '/auth.php';
