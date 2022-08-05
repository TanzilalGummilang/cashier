<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return redirect('dashboard');
});

Route::view('dashboard', 'contents.dashboard.index')->name('dashboard');

Route::resource('products', ProductController::class);

Route::controller(OrderController::class)->group(function () {
    Route::get('orders', 'index')->name('orders.index');
    // Route::post('orders', 'store')->name('orders.store');
});