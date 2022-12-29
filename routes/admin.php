<?php


use App\Http\Controllers\Admin\AdminCategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'],function (){
    Route::get('list', [\App\Http\Controllers\Admin\AdminProductController::class, 'index'])->name('admin.show.all.products');
    Route::post('list', [\App\Http\Controllers\Admin\AdminProductController::class, 'getAllBy'])->name('admin.show.products');
    Route::get('detail/{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'detail'])->name('admin.show.product');
    Route::put('update/{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'update'])->name('admin.update.product');
    Route::get('create', [\App\Http\Controllers\Admin\AdminProductController::class, 'createProcess'])->name('admin.show.form.create');
    Route::get('delete', [\App\Http\Controllers\Admin\AdminProductController::class, 'deleteProcess'])->name('admin.choose.product.delete');
    Route::post('create', [\App\Http\Controllers\Admin\AdminProductController::class, 'create'])->name('admin.create.product');
    Route::post('delete/{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'hiden'])->name('admin.hiden.product');
    Route::delete('{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'delete'])->name('admin.delete.product');
});

Route::group(['prefix' => 'categories'],function (){
    Route::get('list', [AdminCategoryController::class, 'getList'])->name('admin.show.all.categories');
    Route::get('detail/{id}', [AdminCategoryController::class, 'getDetail'])->name('admin.show.detail.category');
    Route::put('update/{id}', [AdminCategoryController::class, 'updateCategory'])->name('admin.update.category');
    Route::get('create', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'createProcess'])->name('admin.form.create.category');
    Route::post('create', [AdminCategoryController::class, 'createCategory'])->name('admin.create.category');
    Route::post('delete/{id}', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'hiden'])->name('admin.hiden.category');
    Route::get('delete', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'deleteProcess'])->name('admin.choose.category.delete');
    Route::delete('{id}', [AdminCategoryController::class, 'deleteCategory'])->name('admin.delete.category');
});
