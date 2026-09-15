<?php

use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', function () {
    $routeNames = [
        'welcome' => 'home',
        'cocktails' => 'cocktails',
        'food' => 'food',
        'coffee' => 'coffee',
        'events' => 'events',
        'happy_hour' => 'happy_hour',
        'opening_party' => 'opening_party',
        'story' => 'story',
        'visit' => 'visit',
    ];
    $priorities = [
        'welcome' => '1.0',
        'opening_party' => '0.9',
        'visit' => '0.9',
        'cocktails' => '0.8',
        'food' => '0.8',
        'coffee' => '0.8',
        'events' => '0.7',
        'happy_hour' => '0.7',
        'story' => '0.6',
    ];

    $lastmods = Page::query()->withMax('fields', 'updated_at')->get()->keyBy('slug');

    $urls = collect($routeNames)->map(fn ($routeName, $slug) => [
        'url' => route($routeName),
        'lastmod' => $lastmods->get($slug)?->fields_max_updated_at?->toAtomString(),
        'priority' => $priorities[$slug] ?? '0.5',
    ])->values();

    return response()
        ->view('sitemap', ['urls' => $urls])
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/robots.txt', function () {
    return response("User-agent: *\nDisallow:\n\nSitemap: ".route('sitemap')."\n")
        ->header('Content-Type', 'text/plain');
});

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
require __DIR__.'/admin.php';
