<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

// Home / Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Products CRUD
Route::resource('products', ProductController::class);

// Categories CRUD
Route::resource('categories', CategoryController::class);

// Ingredients CRUD
Route::resource('ingredients', IngredientController::class);

// Customers CRUD
Route::resource('customers', CustomerController::class);

// Recipes CRUD
Route::resource('recipes', RecipeController::class);

// Orders CRUD
Route::resource('orders', OrderController::class);
