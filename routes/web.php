<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/products', [ProductController::class, 'index'])->name('product');
