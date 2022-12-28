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
Route::get('/welcome', [HomeController::class, 'test'])->name('test');
Route::get('/admin', [HomeController::class, 'admin'])->middleware('auth')->name('admin');

Route::prefix('auth')->group(function () {
    Route::get('login', [\App\Http\Controllers\AuthController::class, 'loginProcess'])->name('login');
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');
    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('list', [\App\Http\Controllers\UserController::class, 'index'])->name('show.all.users');
    Route::get('detail/{id}', [\App\Http\Controllers\UserController::class, 'detail'])->name('show.user');
    Route::put('update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update.user');
    Route::post('create', [\App\Http\Controllers\UserController::class, 'create'])->name('create.user');
    Route::delete('{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete.user');
});

Route::prefix('roles')->middleware('auth')->group(function () {
    Route::get('list', [\App\Http\Controllers\RoleController::class, 'index'])->name('show.all.roles');
    Route::get('detail/{id}', [\App\Http\Controllers\RoleController::class, 'detail'])->name('show.role');
    Route::put('update/{id}', [\App\Http\Controllers\RoleController::class, 'update'])->name('update.role');
    Route::post('create', [\App\Http\Controllers\RoleController::class, 'create'])->name('create.role');
    Route::delete('{id}', [\App\Http\Controllers\RoleController::class, 'delete'])->name('delete.role');
});

Route::prefix('products')->middleware('auth')->group(function () {
    Route::get('list', [ProductController::class, 'index'])->name('show.all.products');
    Route::get('detail/{id}', [ProductController::class, 'detail'])->name('show.product');
});

Route::prefix('categories')->middleware('auth')->group(function () {
    Route::get('list', [CategoryController::class, 'getList'])->name('show.all.categories');
    Route::get('detail/{id}', [CategoryController::class, 'getDetail'])->name('show.detail.category');
    Route::put('update/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
    Route::post('create', [CategoryController::class, 'createCategory'])->name('create.category');
    Route::delete('{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    require_once __DIR__ . '/admin.php';
});

Route::get('test', function () {
    return view('admin.index');
});
