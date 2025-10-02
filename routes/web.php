<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\UserController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;

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


Route::get('/events', [EventsController::class, 'index'])->name('events.index');
Route::post('/contactus', [ContactUsController::class, 'store'])->name('contactus');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
    Route::put('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
    Route::put('/users/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('users.remove-admin');
    Route::view('admins/all', 'users.index')->name('users.index');
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    //Events
    Route::get('admin/events', [EventsController::class, 'adminIndex'])->name('admin.events');
    Route::get('event/new', [EventsController::class, 'create'])->name('events.create');
    Route::post('event/create', [EventsController::class, 'store'])->name('events.store');
    Route::get('event/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
    Route::match(['PUT', 'PATCH'], 'event/{event}/update', [EventsController::class, 'update'])->name('events.update');
//    Route::patch('event/{event}/update', [EventsController::class, 'update'])->name('events.update');
    Route::delete('event/{event}/destroy', [EventsController::class, 'destroy'])->name('events.destroy');

    Route::get('impact/index', [ImpactController::class, 'index'])->name('impact.index');
    Route::get('impact/create', [ImpactController::class, 'create'])->name('impact.create');
    Route::post('impact/store', [ImpactController::class, 'store'])->name('impact.store');

    Route::get('impact/{impact}/edit', [ImpactController::class, 'edit'])->name('impact.edit');
    Route::patch('impact/{impact}', [ImpactController::class, 'update'])->name('impact.update');
    Route::delete('impact/{impact}', [ImpactController::class, 'destroy'])->name('impact.destroy');

});

Route::get('impact/{impact}', [ImpactController::class, 'show'])->name('impact.show');
Route::get('/event/{event}', [EventsController::class, 'show'])->name('events.show');
Route::post('/event/{event}/register', [EventsController::class, 'registerStore'])->name('events.register.store');
Route::get('/event/{event}/register', [EventsController::class, 'register'])->name('event.register');

require __DIR__.'/auth.php';
