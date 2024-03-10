<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');

    Route::get('/dashboard/organisateurs', function () {
        return view('dashboard.organisateurs');
    })->name('dashboard.organisateurs');

    Route::get('/dashboard/clients', function () {
        return view('dashboard.clients');
    })->name('dashboard.clients');

    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories');
    Route::post('/dashboard/categories/stroe', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/dashboard/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::get('buy_ticket', [EventController::class, 'showFormAdd'])->name('buy_ticket');
Route::get('delete_event/{event_id}', [EventController::class, 'deleteEvent'])->name('delete_event');
Route::post('Update_event', [EventController::class, 'updateEvent'])->name('update_event');
Route::get('update_event/{event_id}', [EventController::class, 'showFormUpdate'])->name('formUpdateEvent');


Route::get('/AddEvent', [EventController::class, 'showFormAdd'])->name('formAddEvent');
Route::get('/evento', [EventController::class, 'AllEvents'])->name('AllEvento');
Route::post('/evento', [EventController::class, 'store'])->name('addEvent');
Route::get('/detailsEvent/{event_slug}', [EventController::class, 'showEvent'])->name('showEvent');
Route::get('/evento/{category}', [EventController::class, 'EventsWithCategory'])->name('EventsWithCategory');

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
