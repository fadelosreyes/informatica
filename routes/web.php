<?php

use App\Http\Controllers\OrdenadorController;
use App\Http\Controllers\ProfileController;
use App\Livewire\CrearAula;
use App\Livewire\EditAula;
use App\Livewire\EliminarAula;
use App\Livewire\IndexAula;
use App\Livewire\ShowAula;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('ordenadores', OrdenadorController::class)->parameters([
    'ordenadores' => 'ordenador'
]);

Route::get('/aulas', IndexAula::class)->name('aulas-index');
Route::get('/aula/crear', CrearAula::class)->name('aula-crear');
Route::get('/aula/editar/{aulaid}', EditAula::class)->name('aula-editar');
Route::get('/aula/show/{aulaid}', ShowAula::class)->name('aula-show');
Route::get('/aula/eliminar/{aulaid}', EliminarAula::class)->name('aula-eliminar');

require __DIR__.'/auth.php';
