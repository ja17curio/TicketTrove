<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTicketAvailabilityController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketTypeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('events', EventController::class);
Route::resource('event_tickets_availability', EventTicketAvailabilityController::class);
Route::resource('orders', OrderController::class);
Route::resource('tickets', TicketController::class);
Route::resource('ticket_types', TicketTypeController::class);

