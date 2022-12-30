<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'loginProcess'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::put('update/{id}', [UserController::class, 'update'])->name('update.profile');
    Route::get('myprofile/{id}', [UserController::class, 'myprofile'])->name('myprofile');
    Route::post('changePass', [UserController::class, 'changePassword'])->name('change-password');
});

Route::prefix('roles')->middleware('auth')->group(function () {
    Route::get('list', [RoleController::class, 'index'])->name('show.all.roles');
    Route::get('detail/{id}', [RoleController::class, 'detail'])->name('show.role');
    Route::put('update/{id}', [RoleController::class, 'update'])->name('update.role');
    Route::post('create', [RoleController::class, 'create'])->name('create.role');
    Route::delete('{id}', [RoleController::class, 'delete'])->name('delete.role');
});

Route::prefix('products')->middleware('auth')->group(function () {
    Route::get('list', [ProductController::class, 'index'])->name('show.all.products');
    Route::get('detail/{id}', [ProductController::class, 'detail'])->name('show.product');
});

Route::prefix('categories')->middleware('auth')->group(function () {
    Route::get('list', [CategoryController::class, 'getList'])->name('show.all.categories');
    Route::get('detail/{id}', [CategoryController::class, 'getDetail'])->name('show.detail.category');
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    require_once __DIR__ . '/admin.php';
});

Route::get('test', function () {
    return view('admin.index');
});
