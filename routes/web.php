<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/products/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
