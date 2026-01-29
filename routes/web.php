<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

// Category routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// Product routes
Route::get('/produits', [ProduitController::class, 'index']);
Route::get('/produits/create', [ProduitController::class, 'create']);
Route::post('/produits', [ProduitController::class, 'store']);
Route::get('/produits/{id}', [ProduitController::class, 'show']);
Route::get('/produits/{id}/edit', [ProduitController::class, 'edit']);
Route::put('/produits/{id}', [ProduitController::class, 'update']);
Route::delete('/produits/{id}', [ProduitController::class, 'destroy']);
