<?php

use App\Http\Controllers\FaixasController;
use App\Http\Controllers\AlbumsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('albums')->group(function(){
    Route::get('/', [AlbumsController::class, 'index'])->name('albums-index');
    Route::get('create', [AlbumsController::class, 'create'])->name('albums-create');
    Route::post('/', [AlbumsController::class, 'store'])->name('albums-store');
    Route::get('/{id}/edit', [AlbumsController::class, 'edit'])->where('id', '[0-9]+')->name('albums-edit');
    Route::put('/{id}', [AlbumsController::class, 'update'])->where('id', '[0-9]+')->name('albums-update');
    Route::delete('/{id}', [AlbumsController::class, 'destroy'])->where('id', '[0-9]+')->name('albums-destroy');
    Route::get('/search', [AlbumsController::class, 'search'])->name('albums-search');
    Route::get('/albums/{id}/search', [AlbumsController::class, 'search'])->name('albums-search');
    Route::get('/faixas/{id}/search', [AlbumsController::class, 'searchFaixas'])->name('faixas-search');
    Route::get('/albums/search', [AlbumsController::class, 'searchAlbums'])->name('albums-search');

});

// Rotas para gerenciamento de faixas
Route::prefix('faixas')->group(function(){
    Route::get('create', [FaixasController::class, 'create'])->name('faixas-create');
    Route::post('/', [FaixasController::class, 'store'])->name('faixas-store');
    Route::get('/{id}/edit', [FaixasController::class, 'edit'])->where('id', '[0-9]+')->name('faixas-edit');
    Route::put('/{id}', [FaixasController::class, 'update'])->where('id', '[0-9]+')->name('faixas-update');
    Route::delete('/{id}', [FaixasController::class, 'destroy'])->where('id', '[0-9]+')->name('faixas-destroy');
});

Route::fallback(function(){
    return "Erro ao localizar rota";
});