<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('home/jenis-sopd', [HomeController::class, 'jenisSopd'])->name('home.jenisSopd');

Route::get('home/find', [HomeController::class, 'find'])->name('home.find');

Route::get('home/login', [HomeController::class, 'login'])->name('home.login');

Route::post('home/login', [HomeController::class, 'loginAct'])->name('home.loginAct');

Route::get('admin', [AdminController::class, 'index'])->name('admin');
