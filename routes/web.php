<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\OrdersController;

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

// Šalių valdymo maršrutai
Route::get('/countries', [CountriesController::class, 'index'])->name('countries.index');
Route::get('/countries/{country}', [CountriesController::class, 'show'])->name('countries.show');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/countries/create', [CountriesController::class, 'create'])->name('countries.create');
    Route::post('/countries', [CountriesController::class, 'store'])->name('countries.store');
    Route::get('/countries/{country}/edit', [CountriesController::class, 'edit'])->name('countries.edit');
    Route::put('/countries/{country}', [CountriesController::class, 'update'])->name('countries.update');
    Route::delete('/countries/{country}', [CountriesController::class, 'destroy'])->name('countries.destroy');
});

// Viešbučių valdymo maršrutai
Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{hotel}', [HotelsController::class, 'show'])->name('hotels.show');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/hotels/create', [HotelsController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{hotel}/edit', [HotelsController::class, 'edit'])->name('hotels.edit');
    Route::put('/hotels/{hotel}', [HotelsController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/{hotel}', [HotelsController::class, 'destroy'])->name('hotels.destroy');
});

// Užsakymų valdymo maršrutai
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/approve', [OrdersController::class, 'approve'])->name('orders.approve');
});








