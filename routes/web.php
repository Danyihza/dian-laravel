<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterSistemController;
use App\Http\Controllers\ViewLaporanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/administrasi/pendaftaran', [AdministrasiController::class, 'pendaftaranView'])->name('pendaftaranView');
Route::get('/administrasi/pembayaran', [AdministrasiController::class, 'pembayaranView'])->name('pembayaranView');
Route::get('/administrasi/pembayaran/{id_siswa}/{id_detail_kursus}', [AdministrasiController::class, 'detailPembayaranView'])->name('detailPembayaranView');
Route::post('/administrasi/pembayaran/bayar', [AdministrasiController::class, 'bayarPendidikan'])->name('bayarPendidikan');
Route::get('/administrasi/pengeluaran', [AdministrasiController::class, 'pengeluaranView'])->name('pengeluaranView');
Route::post('/administrasi/pengeluaran/add', [AdministrasiController::class, 'addPengeluaran'])->name('addPengeluaran');
Route::get('/viewlaporan/arsipsiswa', [ViewLaporanController::class, 'arsipSiswaView'])->name('arsipSiswaView');
Route::get('/viewlaporan/arsipsiswa/detail', [ViewLaporanController::class, 'detailSiswa'])->name('detailSiswa');
Route::post('/viewlaporan/arsipsiswa/edit', [ViewLaporanController::class, 'editSiswa'])->name('editSiswa');
Route::get('/viewlaporan/arsippembayaran', [ViewLaporanController::class, 'arsipPembayaranView'])->name('arsipPembayaranView');
Route::get('/viewlaporan/arsippembayaran/detail', [ViewLaporanController::class, 'detailPembayaran'])->name('detailArsipPembayaran');
Route::post('/viewlaporan/arsippembayaran/edit', [ViewLaporanController::class, 'editPembayaran'])->name('editPembayaran');
Route::get('/viewlaporan/laporanharian', [ViewLaporanController::class, 'laporanHarianView'])->name('laporanHarianView');
Route::get('/viewlaporan/laporanharian/detail', [ViewLaporanController::class, 'laporanHarianDetail'])->name('laporanHarianDetail');
Route::get('/viewlaporan/laporanperiode', [ViewLaporanController::class, 'laporanPeriodeView'])->name('laporanPeriodeView');
Route::get('/viewlaporan/laporanperiode/detail', [ViewLaporanController::class, 'laporanPeriodeDetail'])->name('laporanPeriodeDetail');
Route::get('/mastersistem/karyawan', [MasterSistemController::class, 'karyawanView'])->name('karyawanView');
Route::get('/mastersistem/cabang', [MasterSistemController::class, 'cabangView'])->name('cabangView');
Route::get('/mastersistem/kursus', [MasterSistemController::class, 'kursusView'])->name('kursusView');
Route::get('/mastersistem/program', [MasterSistemController::class, 'programView'])->name('programView');
Route::get('/mastersistem/jabatan', [MasterSistemController::class, 'jabatanView'])->name('jabatanView');
Route::get('/administrator', [AdministratorController::class, 'listAdminView'])->name('listAdminView');
Route::post('/administrator/add', [AdministratorController::class, 'addAdmin'])->name('addAdmin');
Route::get('/administrator/remove/{id_admin?}', [AdministratorController::class, 'removeAdmin'])->name('removeAdmin');

Route::post('/administrasi/pendaftaran/daftar', [AdministrasiController::class, 'daftar'])->name('daftar');
Route::post('/mastersistem/karyawan/add', [MasterSistemController::class, 'addKaryawan'])->name('addKaryawan');
Route::post('/mastersistem/cabang/add', [MasterSistemController::class, 'addCabang'])->name('addCabang');
Route::post('/mastersistem/jabatan/add', [MasterSistemController::class, 'addJabatan'])->name('addJabatan');
Route::post('/mastersistem/kursus/add', [MasterSistemController::class, 'addKursus'])->name('addKursus');
Route::post('/mastersistem/program/add', [MasterSistemController::class, 'addProgram'])->name('addProgram');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

