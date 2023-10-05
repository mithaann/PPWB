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

Route::get('/', [\App\Http\Controllers\HomepageController::class,'index']);
Route::get('/kontak', [HomepageController::class, 'kontak'])->name('kontak');
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/produk', [HomepageController::class, 'produk'])->name('produk');
Route::get('/kategori', [HomepageController::class, 'kategori'])->name('kategori');
Route::get('/news', [NewspageController::class, 'index']);
Route::get('/admin', [adminController::class, 'index'])->name('index');
Route::get('/form', [adminController::class, 'form'])->name('form');
Route::get('/list', [adminController::class, 'list'])->name('list');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
