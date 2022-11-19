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


Route::get('/maps', function () {
    return view('googlemap');
})->middleware(['auth', 'verified'])->name('googlempa');;

require __DIR__.'/auth.php';
