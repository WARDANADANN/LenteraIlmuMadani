<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index'])->name('index');
Route::get('/terbitan', [BookController::class, 'terbitan'])->name('terbitan');
Route::get('/kontak', [BookController::class, 'kontak'])->name('kontak');
Route::get('/buku/{id}', [BookController::class, 'detailBook'])->name('buku');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin')->middleware('auth');

Route::get('/admin/add', [AdminController::class, 'add'])->name('add')->middleware('auth');
Route::post('/insert', [AdminController::class, 'insert'])->name('books')->middleware('auth');

Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update')->middleware('auth');

Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/regist', [AuthController::class, 'store'])->name('store');

Route::get('/kirim', [BookController::class, 'kirimNaskah'])->name('kirim');
Route::post('/submitNaskah', [BookController::class, 'submitNaskah'])->name('submitNaskah');
