<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\DataPenggunaController;


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
    return view('welcome');
});

Route::resource('sepatu', SepatuController::class) ->name('index', 'sepatu');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    // Route::get('/data-pengguna', [DataPenggunaController::class, 'index'])->name('dataPengguna.index');
});

Route::group(['middleware' => ['admin']], function(){
    Route::get('/admin', [HomeAdminController::class, 'index']) ->name('homeAdmin.index');
    Route::resource('dataPengguna', DataPenggunaController::class) ->name('index', 'DataPengguna');
});