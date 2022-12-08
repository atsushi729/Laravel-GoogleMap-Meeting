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
Route::post('/maps/delete', [\App\Http\Controllers\MeetingCountroller::class, 'deleteMeeting'])->name('deleteMeeting');


Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/destroy', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';
