<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
  return view('home');
});

Route::get('/terkini', [PostController::class, 'index']);
Route::get('/terkini/{post:slug}', [PostController::class, 'show']);

Route::get('/masuk', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/masuk', [LoginController::class, 'authenticate']);
Route::post('/keluar', [LoginController::class, 'logout']);
Route::get('/daftar', [RegisterController::class, 'index']);
Route::post('/daftar', [RegisterController::class, 'store']);
Route::get('/dasbor', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dasbor/postingan', DashboardPostController::class)->middleware('auth');
Route::resource('/dasbor/kategori', AdminCategoryController::class)->middleware('admin')->except('show');
// Route::get('/kategori', function () {
//   return view('categories', [
//     'categories' => Category::all(),
//     'active' => 'terkini'
//   ]);
// });

// Route::get('/kategori/{category:slug}', function (Category $category) {
//   return view('posts', [
//     'posts' => $category->posts->load('category', 'author'),
//     'category' => $category->name,
//     'active' => 'terkini'
//   ]);
// });

// Route::get('/penulis/{author:username}', function (User $author) {
//   return view('posts', [
//     'posts' => $author->posts->load('category', 'author'),
//     'active' => 'terkini'
//   ]);
// });
