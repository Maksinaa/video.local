<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

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

Route::get(
    '/',
    [IndexController::class, 'index']
)->name('index');

Route::get(
    '/listen/{id}',
    [IndexController::class, 'show']
)->name('show');

Route::put(
    '/like/{id}',
    [IndexController::class, 'like']
)->name('like');

Route::put(
    '/dislike/{id}',
    [IndexController::class, 'dislike']
)->name('dislike');


Auth::routes();

Route::resource('videos', VideoController::class)
    ->except('edit', 'update', 'destroy')
    ->middleware('auth');


Route::resource('videos', VideoController::class)
    ->except('edit', 'update', 'destroy')
    ->middleware('auth');


Route::resource('comments', CommentController::class)
    ->only('store')
    ->middleware('auth');

Route::resource('admins', AdminController::class)
    ->only('index', 'update')
    ->middleware(['auth', 'can:admin']);

Route::get(
    '/home',
    [App\Http\Controllers\HomeController::class, 'index']
)->name('home');
