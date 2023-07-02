<?php

use App\Http\Controllers\Customer\BaseController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kasir\OrderController as KasirOrderController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::get('admin-order-dt', [DashboardController::class, 'indexTableAdmin'])->name('admin-order-dt');

    Route::group(['middleware' => ['role:admin']], function () {});

    Route::group(['middleware' => ['role:kasir']], function () {
        Route::resource('orders', KasirOrderController::class);
        Route::get('order-done/{id}', [KasirOrderController::class, 'done'])->name('orders.done');
        Route::get('order-proses/{id}', [KasirOrderController::class, 'proses'])->name('orders.proses');
        Route::get('kasir-order-dt', [KasirOrderController::class, 'indexTable'])->name('kasir-order-dt');
    });

    Route::group(['middleware' => ['role:customer']], function () {
        Route::resource('customer', BaseController::class);
        Route::resource('customer-order', OrderController::class);
        Route::get('cust-order-dt', [OrderController::class, 'indexTable'])->name('cust-order-dt');
        Route::get('print-invoice/{id}', [OrderController::class, 'printInvoice'])->name('print-invoice');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
