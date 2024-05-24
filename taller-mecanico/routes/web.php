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

Auth::routes();
Route::any('register', function () {
    abort(403);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('categorias');
    Route::post('admin/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::put('admin/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::delete('admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/admin/product', [App\Http\Controllers\ProductController::class, 'index'])->name('productos');
    Route::post('admin/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::put('admin/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
    Route::get('/admin/discount', [App\Http\Controllers\DiscountController::class, 'index'])->name('descuentos');
    Route::post('admin/discount/store', [App\Http\Controllers\DiscountController::class, 'store'])->name('discount.store');
    Route::put('admin/discount/update/{id}', [App\Http\Controllers\DiscountController::class, 'update'])->name('discount.update');
    Route::delete('admin/discount/delete/{id}', [App\Http\Controllers\DiscountController::class, 'delete'])->name('discount.delete');
    Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::post('admin/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::put('admin/users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('admin/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    Route::put('admin/users/changepassword/{id}', [App\Http\Controllers\UserController::class, 'change_password'])->name('user.password');
    Route::get('admin/comments', [App\Http\Controllers\ContactController::class, 'index'])->name('comments');
    Route::post('admin/comments/read', [App\Http\Controllers\ContactController::class, 'read'])->name('comments.read');
    Route::delete('admin/comments/delete/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('comments.delete');
});
