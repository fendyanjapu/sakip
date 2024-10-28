<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RfkController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\RfkProgramController;
use App\Http\Controllers\RfkKegiatanController;
use App\Http\Controllers\RfkRealisasiContoller;
use App\Http\Controllers\RfkSubkegiatanContoller;
use App\Http\Controllers\CapaianKinerjaController;
use App\Http\Controllers\CapaianKinerjaBulananController;

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

Route::get('home/login', [HomeController::class, 'login'])->name('login');

Route::post('home/login', [HomeController::class, 'loginAct'])->name('home.loginAct');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');

    Route::get('arsip/{jenis_dokumen}', [ArsipController::class, 'index'])->name('arsip');

    Route::get('arsip/docs/{id}', [ArsipController::class, 'docs'])->name('docs');

    Route::post('arsip/save', [ArsipController::class, 'save'])->name('arsip.save');

    Route::get('arsip/delete/{id}', [ArsipController::class, 'delete'])->name('arsip.delete');

    Route::get('ajax/select-program', [AjaxController::class, 'selectProgram'])->name('selectProgram');

    Route::get('ajax/select-kegiatan', [AjaxController::class, 'selectKegiatan'])->name('selectKegiatan');

    Route::get('ajax/select-program-kegiatan', [AjaxController::class, 'selectProgramKegiatan'])->name('selectProgramKegiatan');

    Route::get('ajax/select-kegiatan-subkegiatan', [AjaxController::class, 'selectProgramKegiatan'])->name('selectKegiatanSubkegiatan');


    Route::resource('capaian-kinerja', CapaianKinerjaController::class)->except('show');

    Route::resource('capaian-kinerja-bulanan', CapaianKinerjaBulananController::class)->except('show');

    Route::resource('rfk', RfkController::class);

    Route::resource('rfk-program', RfkProgramController::class)->except('show');

    Route::resource('rfk-kegiatan', RfkKegiatanController::class)->except('show');

    Route::resource('rfk-subkegiatan', RfkSubkegiatanContoller::class)->except('show');

    Route::resource('rfk-realisasi', RfkRealisasiContoller::class)->except('show');
});