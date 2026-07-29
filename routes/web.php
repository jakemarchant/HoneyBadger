<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->name('home');
Route::view('/opening-party', 'pages.default.opening_party')
    ->name('opening_party');
Route::view('/happy-hour', 'pages.default.happy_hour')
    ->name('happy_hour');
Route::view('/coffee', 'pages.default.coffee')
    ->name('coffee');
    
Route::view('/food', 'pages.default.food')
    ->name('food');
    
Route::view('/cocktails', 'pages.default.cocktails')
    ->name('cocktails');
    
Route::view('/story', 'pages.default.story')
    ->name('story');


Route::view('/events', 'pages.default.events')
    ->name('events');

Route::view('/visit', 'pages.default.visit')
    ->name('visit');
Route::post('/visit/submit', [App\Http\Controllers\VisitController::class, 'submit'])
->name('visit.submit');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
