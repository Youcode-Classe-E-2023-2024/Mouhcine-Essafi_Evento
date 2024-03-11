<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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

//Home page
Route::get('/', function () {
    return view('welcome');
});

//Authentification
Route::middleware(['guest'])->group(function () {

    Route::get('/register', [RegisterController::class, 'register']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'login']);
    Route::post('/login', [LoginController::class, 'store']);


    Route::get('/forgot-password', [ForgotPasswordLinkController::class, 'create'])->name('forgot-password');

    Route::post('/forgot-request', [ForgotPasswordLinkController::class, 'store']);

    Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('new_password');

// Password Reset
    Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showForm'])->name('password.reset');

    Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

});


Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout')->middleware('auth');

    Route::post('/buy/{id}', [ReservationController::class, 'buy']);

    Route::post('/paiement/{id}', [ReservationController::class, 'paiement']);
    Route::get('/paiement/{id}', [ReservationController::class, 'paiement']);
    Route::get('/paiement/{id}', [ReservationController::class, 'paiementLink']);

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard']);

    Route::get('/side', function () {
        return view('admin.side');
    });

    Route::get('/allusers', [UserController::class, 'show']);
    Route::post('/allusers/{id}', [UserController::class, 'update']);

    Route::delete('/delete/{id}', [UserController::class, 'deleteUser']);
    Route::get('/deletedUsers', [UserController::class, 'showDeletedUsers']);
    Route::post('/restore/{id}', [UserController::class, 'restoreUser']);

    Route::get('/events', [EventController::class, 'CheckEvent']);
    Route::get('/approveEvents', function () {
        return view('admin.approveEvents');
    });

    //aprove or decline events
    Route::post('/approve-event/{id}', [EventController::class, 'approveEvent']);
    Route::post('/decline-event/{id}', [EventController::class, 'declineEvent']);


    //category
    Route::get('/categories', [CategoryController::class, 'showCategories']);

    Route::post('/categories', [CategoryController::class, 'store']);

    Route::delete('/deleteCategory/{id}', [CategoryController::class, 'destroyCategory']);

});


Route::middleware(['auth', 'organizer'])->group(function () {

    Route::get('/organizer', [UserController::class, 'statistic']);

    //events
    Route::get('/createEvent', [EventController::class, 'showForm']);

    Route::post('/createEvent', [EventController::class, 'store']);

    Route::get('/allEvents', [EventController::class, 'AllEvents']);

    Route::get('/description/{id}', [EventController::class, 'ShowEventDescription']);

    Route::delete('/deleteEvent/{id}', [EventController::class, 'deleteEvent']);

    Route::get('/updateEvent/{id}', [EventController::class, 'editEvent']);

    Route::post('/updateEvent/{id}', [EventController::class, 'updateEvent']);

    Route::get('/reservations', [ReservationController::class, 'CheckReservation']);

    //aprove or decline
    Route::post('/approve-reservation/{id}', [ReservationController::class, 'approveReservation']);
    Route::post('/decline-reservation/{id}', [ReservationController::class, 'declineReservation']);

});


//search
Route::post('/search', [EventController::class, 'search']);

//filter
Route::get('/filter/{category}', [EventController::class, 'filterByCategory']);


//home page
Route::get('/', [UserController::class, 'home']);


Route::get('/description/{id}', [EventController::class, 'EventContent']);
