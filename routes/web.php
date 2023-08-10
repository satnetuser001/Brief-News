<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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

//Auth Controllers
Auth::routes();

//HomeController
Route::get('/', [HomeController::class, 'home'])->name('home');

//ArticleController
Route::get('/articles/my', [ArticleController::class, 'my'])->name('articles.my');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('/articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/articles/{article}/destroyConfirm', [ArticleController::class, 'destroyConfirm'])->name('articles.destroyConfirm');
Route::delete('/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/articles/trashed', [ArticleController::class, 'trashed'])->name('articles.trashed');
Route::patch('/articles/{id}/restore', [ArticleController::class, 'restore'])->name('articles.restore');

//UserController
Route::get('/users/myProfile', [UserController::class, 'myProfile'])->name('users.myProfile');
Route::patch('/users/{user}/updateMyProfile', [UserController::class, 'updateMyProfile'])->name('users.updateMyProfile');
Route::get('/users/editPassword', [UserController::class, 'editPassword'])->name('users.editPassword');
Route::patch('/users/{user}/updatePassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');
Route::get('/users/allProfiles', [UserController::class, 'allProfiles'])->name('users.allProfiles');
Route::get('/users/{user}/editUserProfile', [UserController::class, 'editUserProfile'])->name('users.editUserProfile');
Route::patch('/users/{user}/updateUserProfile', [UserController::class, 'updateUserProfile'])->name('users.updateUserProfile');
Route::get('/users/{user}/destroyConfirm', [UserController::class, 'destroyConfirm'])->name('users.destroyConfirm');
Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');