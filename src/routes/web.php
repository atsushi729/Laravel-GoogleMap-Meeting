<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', \App\Http\Controllers\ChirpController::class)
    ->only(['destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/chirps/index', \App\Http\Actions\Chirps\IndexAction::class)->name('chirps.index');
    Route::post('/chirps/store', \App\Http\Actions\Chirps\StoreAction::class)->name('chirps.store');
    Route::get('/chirps/edit', \App\Http\Actions\Chirps\EditAction::class)->name('chirps.edit');
    Route::post('/chirps/update', \App\Http\Actions\Chirps\UpdateAction::class)->name('chirps.update');
});

require __DIR__.'/auth.php';
