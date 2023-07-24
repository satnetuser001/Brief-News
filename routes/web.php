<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/userArticles', [ArticleController::class, 'userArticles'])->name('articles.userArticles');
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('articles/{sourceLink}', [ArticleController::class, 'deleteSourceLink'])->name('articles.deleteSourceLink');
Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');