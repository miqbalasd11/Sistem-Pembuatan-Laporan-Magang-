<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilMagangController;
use App\Http\Controllers\KegiatanMagangController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profil Magang
|--------------------------------------------------------------------------
*/

Route::get('/profil', [ProfilMagangController::class, 'index'])
    ->name('profil.index');

Route::get('/profil/edit', [ProfilMagangController::class, 'edit'])
    ->name('profil.edit');

Route::put('/profil/update', [ProfilMagangController::class, 'update'])
    ->name('profil.update');

/*
|--------------------------------------------------------------------------
| Kegiatan Magang
|--------------------------------------------------------------------------
*/

Route::resource(
    'kegiatan',
    KegiatanMagangController::class
);

/*
|--------------------------------------------------------------------------
| Laporan Harian
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan/harian',
    [LaporanController::class, 'harian']
)->name('laporan.harian');

/*
|--------------------------------------------------------------------------
| Laporan Mingguan
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan/mingguan',
    [LaporanController::class, 'mingguan']
)->name('laporan.mingguan');

/*
|--------------------------------------------------------------------------
| Laporan Bulanan
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan/bulanan',
    [LaporanController::class, 'bulanan']
)->name('laporan.bulanan');

/*
|--------------------------------------------------------------------------
| Laporan Akhir
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan/akhir',
    [LaporanController::class, 'akhir']
)->name('laporan.akhir');

/*
|--------------------------------------------------------------------------
| PDF Harian
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan/harian/pdf',
    [LaporanController::class, 'harianPdf']
)->name('laporan.harian.pdf');

/*
|--------------------------------------------------------------------------
| PDF Mingguan
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan/mingguan/pdf',
    [LaporanController::class, 'mingguanPdf']
)->name('laporan.mingguan.pdf');

/*
|--------------------------------------------------------------------------
| PDF Bulanan
|--------------------------------------------------------------------------
*/

Route::get('/laporan/bulanan/pdf',
    [LaporanController::class,'bulananPdf'])
    ->name('laporan.bulanan.pdf');

/*
|--------------------------------------------------------------------------
| PDF Akhir
|--------------------------------------------------------------------------
*/

Route::get(
    '/laporan/akhir/pdf',
    [LaporanController::class, 'akhirPdf']
)->name('laporan.akhir.pdf');