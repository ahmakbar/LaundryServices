<?php

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
    return view('home');
})->name('home');

Route::get('/riwayat', function () {
    return view('riwayat');
})->name('riwayat');

Route::get('/signin', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('register');
})->name('register');

Route::get('/kasir/home', function () {
    return view('kasir.index');
})->name('kasir_index');

