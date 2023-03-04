<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DelegatesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippingListController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UserController;
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

/*
    ِAdminPanel =>
    {
        email => [code@code.com, admin@admin.com]
        password => [Code123456789]
    }
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::redirect('/', 'index');

    // States - Cities
    Route::resource('/states', StatesController::class);
    Route::resource('/cities', CitiesController::class);

    Route::resource('/shippingList', ShippingListController::class);

    // Client
    Route::resource('/clients', ClientsController::class);

    // Delegates
    Route::resource('/suppliers', SuppliersController::class);

    // delegates
    Route::resource('/delegates', DelegatesController::class);
});

