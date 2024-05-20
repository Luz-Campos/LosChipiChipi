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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::post('/contacto', [App\Http\Controllers\FrontendController::class, 'form_store'])->name('form_store');
Route::get('/product-detail/{id}', [App\Http\Controllers\FrontendController::class, 'product_detail'])->name('product_detail');
