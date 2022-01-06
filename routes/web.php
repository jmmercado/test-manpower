<?php

use App\Http\Controllers\CategoriesController;
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
    return view('home');
});

Route::get('/categories', [CategoriesController::class, 'index'])->name('categorie.index');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categorie.create');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categorie.store');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categorie.edit');
Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categorie.update');
Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('categorie.delete');
