<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('dashboard', DashboardController::class);
Route::resource('merchandise', MerchandiseController::class);
Route::resource('minuman', MinumanController::class);
Route::resource('product', ProductController::class);
Route::resource('pegawai', PegawaiController::class);
Route::resource('testimoni', TestimoniController::class);
