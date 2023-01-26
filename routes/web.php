<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['register' => false]);
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::redirect('/', 'index');

    // Countries - States - Cities
    Route::post('/getStates', [CitiesController::class, 'getStates']);
    Route::resource('/countries', CountriesController::class);
    Route::resource('/states', StatesController::class);
    Route::resource('/cities', CitiesController::class);

    // Client
    Route::resource('/clients', ClientsController::class);

    // Delegates
    Route::resource('/suppliers', SuppliersController::class);

    // Route::get('/{page}', [AdminController::class, 'index']);
});

