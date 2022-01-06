<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

Route::get('/', function () {
    return view('login');
});

//Routes categories
Route::get('/categories', [CategoriesController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('category.create');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('category.store');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('category.delete');
//Routes products
Route::get('/products', [ProductsController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductsController::class, 'store'])->name('product.store');
