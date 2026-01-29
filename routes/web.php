<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

//Admin routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

//Category routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

//Product routes
Route::get('/produits', [ProductController::class, 'index']);
Route::get('/produits/create', [ProductController::class, 'create']);
Route::post('/produits', [ProductController::class, 'store']);
Route::get('/produits/{id}', [ProductController::class, 'show']);
Route::get('/produits/{id}/edit', [ProductController::class, 'edit']);
Route::put('/produits/{id}', [ProductController::class, 'update']);
Route::delete('/produits/{id}', [ProductController::class, 'destroy']);
