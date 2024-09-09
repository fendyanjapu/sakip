<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\CapaianKinerjaController;
use App\Http\Controllers\CapaianKinerjaBulananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RfkController;
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

Route::get('home/arsip/{id_menu}', [HomeController::class, 'arsip'])->name('home.arsip');

Route::get('home/download/{id}', [HomeController::class, 'download'])->name('download');

Route::get('home/login', [HomeController::class, 'login'])->name('home.login');

Route::post('home/login', [HomeController::class, 'loginAct'])->name('home.loginAct');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('admin', [AdminController::class, 'index'])->name('admin');

Route::get('arsip/{jenis_dokumen}', [ArsipController::class, 'index'])->name('arsip');

Route::get('arsip/docs/{id}', [ArsipController::class, 'docs'])->name('docs');

Route::post('arsip/save', [ArsipController::class, 'save'])->name('arsip.save');

Route::get('arsip/delete/{id}', [ArsipController::class, 'delete'])->name('arsip.delete');

Route::resource('capaian-kinerja', CapaianKinerjaController::class)->except('show');

Route::resource('capaian-kinerja-bulanan', CapaianKinerjaBulananController::class)->except('show');

Route::resource('rfk', RfkController::class);