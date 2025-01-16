<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\OrganizerController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\PublicEventController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

// Начална страница
Route::get('/', function () {
    $latestEvents = Event::with(['sport', 'organizer'])
                        ->orderBy('start_time', 'asc')
                        ->where('start_time', '>', now())
                        ->take(6)
                        ->get();
    return view('welcome', compact('latestEvents'));
})->name('home'); // добавяме име на рута

// Публични рутове
Route::get('/events', [PublicEventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [PublicEventController::class, 'show'])->name('events.show');

// Автентикация и профил
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Админ рутове
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('sports', SportController::class);
    Route::resource('organizers', OrganizerController::class);
    Route::resource('events', AdminEventController::class);
});

require __DIR__.'/auth.php';