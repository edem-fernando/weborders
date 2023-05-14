<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->group(function () {
    Route::get('', [WebController::class, 'welcome'])->name('web.index');
    Route::get('login', [WebController::class, 'login'])->name('web.login');
    Route::get('logout', [WebController::class, 'logout'])->name('web.logout');
    Route::post('attempt', [WebController::class, 'attempt'])->name('web.attempt');
    
    Route::post('finalize', [WebController::class, 'createOrder'])->name('web.finalize');
});

Route::middleware('auth')->prefix('/app')->group(function () {
    Route::get('', [AppController::class, 'index'])->name('app.home');
    Route::get('/', [AppController::class, 'index'])->name('app.home');

    Route::prefix('/clients')->group(function () {
        Route::get('', [ClientsController::class, 'index'])->name('app.clients.index');
        Route::get('/', [ClientsController::class, 'index'])->name('app.clients.index');
        
        Route::post('/save', [ClientsController::class, 'save'])->name('app.clients.save');
        Route::post('/filter', [ClientsController::class, 'filter'])->name('app.clients.filter');
        
        Route::get('/get/{phone}', [ClientsController::class, 'get'])->name('app.clients.get');
    });
    
    Route::prefix('/orders')->group(function () {
        Route::get('', [OrdersController::class, 'index'])->name('app.orders.index');
        Route::get('/', [OrdersController::class, 'index'])->name('app.orders.index');
        Route::get('/{id}', [OrdersController::class, 'edit'])->name('app.orders.edit');
        Route::put('/{id}/save', [OrdersController::class, 'save'])->name('app.orders.save');
        Route::post('/filter', [OrdersController::class, 'filter'])->name('app.orders.filter');
    });
    
    Route::prefix('/menu')->group(function () {
        Route::get('', [MenuController::class, 'index'])->name('app.menu.index');
        Route::get('/', [MenuController::class, 'index'])->name('app.menu.index');
        Route::post('/save', [MenuController::class, 'save'])->name('app.menu.save');
        Route::post('/filter', [MenuController::class, 'filter'])->name('app.menu.filter');
    });
});
