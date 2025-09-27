<?php

use App\Http\Controllers\EventsController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/impact', function () {
    return view('impact');
})->name('impact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/events', [EventsController::class, 'index'])->name('events.index');
Route::get('/event/{event}', [EventsController::class, 'show'])->name('events.show');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::post('event/create', [EventsController::class, 'store'])->name('events.store');
    Route::patch('event/{event}/update', [EventsController::class, 'update'])->name('events.update');
    Route::delete('event/{event}/destroy', [EventsController::class, 'destroy'])->name('events.destroy');

});

require __DIR__.'/auth.php';
