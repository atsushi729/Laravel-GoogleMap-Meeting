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

Route::get('/maps', function (){
    return view('googlemaps');
})->middleware(['auth', 'verified'])->name('googlemaps');;

require __DIR__.'/auth.php';
