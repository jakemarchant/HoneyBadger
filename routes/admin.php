<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/dashboard');

    Route::livewire('pages', 'pages::admin.pages.index')->name('pages.index');
    Route::livewire('pages/{page:slug}/edit', 'pages::admin.pages.edit')->name('pages.edit');

    Route::livewire('enquiries', 'pages::admin.enquiries.index')->name('enquiries.index');

    Route::livewire('users', 'pages::admin.users.index')->name('users.index');
    Route::livewire('users/create', 'pages::admin.users.create')->name('users.create');
    Route::livewire('users/{user}/edit', 'pages::admin.users.edit')->name('users.edit');
});
