<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/config', function () {
    return view('config');
});

Route::get('/dashboard', function () {
    $meetings = \App\Models\Meeting::where('user_id', Auth::id())->get();
    return view('dashboard', compact('meetings'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/maps', function (){
    return view('googlemaps');
})->middleware(['auth', 'verified'])->name('googlemaps');;

Route::post('/maps', [\App\Http\Controllers\MeetingCountroller::class, 'addMeeting'])->name('addMeeting');

require __DIR__.'/auth.php';
