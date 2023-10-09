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
    Route::get('/form_buah', [AdminController::class, 'form_buah'])->name('form_buah');
    Route::get('/form_negara', [AdminController::class, 'form_negara'])->name('form_negara');
    Route::get('/list_buah', [AdminController::class, 'list_buah'])->name('list_buah');
    Route::get('/list_negara', [AdminController::class, 'list_negara'])->name('list_negara');
    Route::POST('/store_negara', [AdminController::class, 'store_negara'])->name('store_negara');
    Route::get('/store_negara/{id}/update', [AdminController::class, 'update_page_negara'])->name('update_page_negara');
    Route::put('/store_negara/{id}', [AdminController::class, 'edit_negara'])->name('edit_negara');
    Route::delete('/hapus_negara/{id}', [AdminController::class, 'negara_hapus'])->name('hapus_negara');
    Route::POST('/store_buah', [AdminController::class, 'store_buah'])->name('store_buah');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
