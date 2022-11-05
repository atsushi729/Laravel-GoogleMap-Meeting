<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', \App\Http\Controllers\ChirpController::class)
    ->only(['update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/chirps/index', \App\Http\Actions\Chirps\IndexAction::class)->name('chirps.index');
    Route::get('/chirps', \App\Http\Actions\Chirps\EditAction::class)->name('chirps.edit');
    Route::post('/chirps', \App\Http\Actions\Chirps\StoreAction::class)->name('chirps.store');
});

require __DIR__.'/auth.php';
