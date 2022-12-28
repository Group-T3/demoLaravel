<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'],function (){
    Route::get('list', [\App\Http\Controllers\Admin\AdminProductController::class, 'index'])->name('admin.show.all.products');
    Route::get('detail/{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'detail'])->name('admin.show.product');
    Route::put('update/{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'update'])->name('admin.update.product');
    Route::get('create', [\App\Http\Controllers\Admin\AdminProductController::class, 'createProcess'])->name('admin.show.form.create');
    Route::get('delete', [\App\Http\Controllers\Admin\AdminProductController::class, 'deleteProcess'])->name('admin.choose.product.delete');
    Route::post('create', [\App\Http\Controllers\Admin\AdminProductController::class, 'create'])->name('admin.create.product');
    Route::post('delete/{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'hiden'])->name('admin.hiden.product');
    Route::delete('{id}', [\App\Http\Controllers\Admin\AdminProductController::class, 'delete'])->name('admin.delete.product');
});
