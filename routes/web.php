<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('list', [ProductController::class, 'index'])->name('show.all.products');
    Route::get('detail/{id}', [ProductController::class, 'detail'])->name('show.product');
    Route::put('{id}', [ProductController::class, 'update'])->name('update.product');
    Route::post('create', [ProductController::class, 'create'])->name('create.product');
});

Route::prefix('categories')->group(function () {
    Route::get('list', [CategoryController::class, 'getList'])->name('show.all.categories');
    Route::get('detail/{id}', [CategoryController::class, 'getDetail'])->name('show.detail.category');
    Route::put('{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
    Route::post('create', [CategoryController::class, 'createCategory'])->name('create.category');
    Route::delete('{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
});
