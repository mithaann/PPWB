<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\Keranjang;
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

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomepageController::class, 'index']);
    Route::get('/kontak', [HomepageController::class, 'kontak'])->name('kontak');
    Route::get('/about', [HomepageController::class, 'about'])->name('about');
    Route::get('/produk', [HomepageController::class, 'produk'])->name('produk');
    Route::get('/kategori', [HomepageController::class, 'kategori'])->name('kategori');
});

// Routes for News
Route::group(['prefix' => '/news'], function () {
    Route::get('/', [NewspageController::class, 'index']);
});

// Routes for Admin
Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/form', [AdminController::class, 'form'])->name('form');
    Route::get('/list_buah', [AdminController::class, 'list_buah'])->name('list_buah');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
