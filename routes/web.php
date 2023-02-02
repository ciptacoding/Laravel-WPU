<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']); // route model binding
//{slug} adalah wildcard yang mengambil semua nilai yang ada pada url

Route::get('/categories', [PostController::class, 'categories']);
Route::get('/category/{category:slug}', [PostController::class, 'showCategory']);
Route::get('/authors/{user:username}', [PostController::class, 'showAuthors']);