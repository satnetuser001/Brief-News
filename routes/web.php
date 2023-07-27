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

Route::get('/myArticles', [ArticleController::class, 'myArticles'])->name('articles.myArticles');
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('articles/{sourceLink}/deleteSourceLink', [ArticleController::class, 'deleteSourceLink'])->name('articles.deleteSourceLink');
Route::get('articles/{article}/destroyConfirm', [ArticleController::class, 'destroyConfirm'])->name('articles.destroyConfirm');
Route::delete('articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('articles/trashedArticles', [ArticleController::class, 'trashedArticles'])->name('articles.trashedArticles');
Route::patch('articles/{id}/restore', [ArticleController::class, 'restoreArticle'])->name('articles.restore');