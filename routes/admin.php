<?php


use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [HomeController::class, 'admin'])->middleware('auth')->name('admin.home');

Route::group(['prefix' => 'products'],function (){
    Route::get('list', [AdminProductController::class, 'index'])->name('admin.show.all.products');
    Route::post('list', [AdminProductController::class, 'index'])->name('admin.search.all.products');
    Route::post('list/by', [AdminProductController::class, 'getAllBy'])->name('admin.show.products');
    Route::get('detail/{id}', [AdminProductController::class, 'detail'])->name('admin.show.product');
    Route::put('update/{id}', [AdminProductController::class, 'update'])->name('admin.update.product');
    Route::get('create', [AdminProductController::class, 'createProcess'])->name('admin.show.form.create');
    Route::get('delete', [AdminProductController::class, 'deleteProcess'])->name('admin.choose.product.delete');
    Route::post('create', [AdminProductController::class, 'create'])->name('admin.create.product');
    Route::post('delete/{id}', [AdminProductController::class, 'hiden'])->name('admin.hiden.product');
    Route::delete('{id}', [AdminProductController::class, 'delete'])->name('admin.delete.product');
});

Route::group(['prefix' => 'categories'],function (){
    Route::get('list', [AdminCategoryController::class, 'getList'])->name('admin.show.all.categories');
    Route::get('detail/{id}', [AdminCategoryController::class, 'getDetail'])->name('admin.show.detail.category');
    Route::put('update/{id}', [AdminCategoryController::class, 'updateCategory'])->name('admin.update.category');
    Route::get('create', [AdminCategoryController::class, 'createProcess'])->name('admin.form.create.category');
    Route::post('create', [AdminCategoryController::class, 'createCategory'])->name('admin.create.category');
    Route::post('delete/{id}', [AdminCategoryController::class, 'hiden'])->name('admin.hiden.category');
    Route::get('delete', [AdminCategoryController::class, 'deleteProcess'])->name('admin.choose.category.delete');
    Route::delete('{id}', [AdminCategoryController::class, 'deleteCategory'])->name('admin.delete.category');
});

Route::group(['prefix' => 'users'],function (){
    Route::get('list', [AdminUserController::class, 'index'])->name('admin.show.all.users');
    Route::post('list', [AdminUserController::class, 'index'])->name('admin.search.all.users');
    Route::get('list-ban', [AdminUserController::class, 'getAllByStatusBan'])->name('admin.show.all.users.ban');
    Route::get('list-delete', [AdminUserController::class, 'getAllByStatusDelete'])->name('admin.show.all.users.delete');
//    Route::post('list/filter', [AdminUserController::class, 'getAllBy'])->name('admin.show.filter');
    Route::get('detail/{id}', [AdminUserController::class, 'detail'])->name('admin.show.user');
    Route::put('update/{id}', [AdminUserController::class, 'update'])->name('admin.update.user');
    Route::get('create', [AdminUserController::class, 'createProcess'])->name('admin.form.create.user');
    Route::post('create', [AdminUserController::class, 'create'])->name('admin.create.user');
    Route::post('delete/{id}', [AdminUserController::class, 'hiden'])->name('admin.hiden.user');
    Route::get('delete', [AdminUserController::class, 'deleteProcess'])->name('admin.choose.user.delete');
    Route::delete('{id}', [AdminUserController::class, 'delete'])->name('admin.delete.user');
});

Route::group(['prefix' => 'roles'],function (){
    Route::get('list', [AdminRoleController::class, 'index'])->name('admin.show.all.roles');
    Route::get('detail/{id}', [AdminRoleController::class, 'detail'])->name('admin.show.role');
    Route::put('update/{id}', [AdminRoleController::class, 'update'])->name('admin.update.role');
    Route::get('create', [AdminRoleController::class, 'createProcess'])->name('admin.form.create.role');
    Route::post('create', [AdminRoleController::class, 'create'])->name('admin.create.role');
    Route::post('delete/{id}', [AdminRoleController::class, 'hiden'])->name('admin.hiden.role');
    Route::get('delete', [AdminRoleController::class, 'deleteProcess'])->name('admin.choose.role.delete');
    Route::delete('{id}', [AdminRoleController::class, 'delete'])->name('admin.delete.role');
});
