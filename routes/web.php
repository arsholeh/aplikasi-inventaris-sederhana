<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/products/{id}', [ProductController::class, 'delete'])->name('product.delete');
