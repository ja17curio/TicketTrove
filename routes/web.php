<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTicketAvailabilityController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OutstandingBillController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard/{user}', [HomeController::class, 'dashboard'])->name('dashboard');
Route::resource('events', EventController::class);
Route::resource('event_tickets_availability', EventTicketAvailabilityController::class);
Route::resource('orders', OrderController::class);
Route::resource('tickets', TicketController::class);
Route::resource('ticket_types', TicketTypeController::class);
Route::resource('shopping_cart', ShoppingCartController::class);
Route::resource('payments', PaymentController::class);
Route::resource('outstanding_bills', OutstandingBillController::class);
Route::resource('users', UserController::class);

//example routes
Route::get('example/test', [ExampleController::class, 'testfunctie']);
Route::get('example/test3', [ExampleController::class, 'testfunctie4']);
Route::resource('example', ExampleController::class);
/*
 * GET      /example                    index       example.index       Overview
 * GET      /example/create             create      example.create      SHOW INSERT view
 * POST     /example                    store       example.store       INSERT resource
 * GET      /example/{example}          show        example.show        SHOW 1
 * GET      /example/{example}/edit     edit        example.edit        SHOW EDIT view
 * PUT      /example/{example}          update      example.update      UPDATE resource
 * DELETE   /example/{example}          destroy     example.destroy     DELETE resource
 */

Route::get('example/test/{event}', [ExampleController::class, 'testfunctie2']);
Route::get('example/test2/{event}', [ExampleController::class, 'testfunctie3']);
