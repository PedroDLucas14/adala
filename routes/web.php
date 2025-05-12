<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/sobreNosotros', 'sobreNosotros')->name('sobreNosotros');
    Route::get('/contacto', 'contacto')->name('contacto');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(EventosController::class)->group(function () {
    Route::get('/eventos', 'index')->name('eventos.index');
    Route::get('/eventos/create', 'create')->name('eventos.create');
    Route::post('/eventos', 'store')->name('eventos.store');
    Route::get('/eventos/ver/{evento}', 'show')->name('verEvento');
    Route::get('/eventos/{evento}/edit', 'edit')->name('eventos.edit');
    Route::put('/eventos/{evento}', 'update')->name('eventos.update');
    Route::delete('/eventos/{evento}', 'destroy')->name('eventos.destroy');
});
require __DIR__.'/auth.php';
