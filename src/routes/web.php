<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/config', function () {
    return view('config');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/chirps/index', \App\Http\Actions\Chirps\IndexAction::class)->name('chirps.index');
    Route::post('/chirps/store', \App\Http\Actions\Chirps\StoreAction::class)->name('chirps.store');
    Route::get('/chirps/{chirp}', \App\Http\Actions\Chirps\EditAction::class)->name('chirps.edit');
    Route::patch('/chirps/{chirp}', \App\Http\Actions\Chirps\UpdateAction::class)->name('chirps.update');
    Route::delete('chirps/{chirp}', \App\Http\Actions\Chirps\DeleteAction::class)->name('chirps.destroy');
});

require __DIR__.'/auth.php';
