<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\NilaiController;

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

Route::get('home',[Homecontroller::class, 'index'])->name('home');
Route::get('siswa',[SiswaController::class, 'siswa'])->name('siswa');
Route::get('input_siswa',[SiswaController::class, 'input_siswa'])->name('input_siswa');
Route::post('simpan_siswa',[SiswaController::class, 'save'])->name('simpan_siswa');
Route::get('edit_siswa/{id_siswa}',[SiswaController::class, 'edit_siswa'])->name('edit_siswa');
Route::post('update-siswa',[SiswaController::class, 'updatesiswa'])->name('update-siswa');
Route::get('hapus-siswa/{id_siswa}',[SiswaController::class, 'hapus'])->name('hapus-siswa');

Route::get('matapelajaran',[MatapelajaranController::class, 'matapelajaran'])->name('matapelajaran');
Route::get('input_matapelajaran',[MatapelajaranController::class, 'input_matapelajaran'])->name('input_matapelajaran');
Route::post('simpan_data',[MatapelajaranController::class, 'save_data'])->name('simpan_data');
Route::get('edit_mapel/{id_mapel}',[MatapelajaranController::class, 'edit_mapel'])->name('edit_mapel');
Route::post('update_mapel',[MatapelajaranController::class, 'update_mapel'])->name('update_mapel');
Route::get('hapus_mapel/{id_mapel}',[MatapelajaranController::class, 'hapus_mapel'])->name('hapus_mapel');

Route::get('semester',[SemesterController::class, 'semester'])->name('semester');
Route::get('input_semester',[SemesterController::class, 'input_semester'])->name('input_semester');
Route::post('simpan_semester',[SemesterController::class, 'save_data'])->name('simpan_semester');
Route::get('edit_semester/{id_semester}',[SemesterController::class, 'edit_semester'])->name('edit_semester');
Route::post('update_semester',[SemesterController::class, 'update_semester'])->name('update_semester');
Route::get('hapus_semester/{id_semester}',[SemesterController::class, 'hapus_semester'])->name('hapus_semester');

Route::get('absensi',[AbsenController::class, 'absen'])->name('absensi');
Route::get('input_absen',[AbsenController::class, 'input_absen'])->name('input_absen');
Route::get('rekap_absen/{id?}/{semester?}',[AbsenController::class, 'rekap_absen'])->name('rekap_absen');
Route::get('cetak_absen/{id?}/{semester?}',[AbsenController::class, 'cetak_absen'])->name('cetak_absen');
Route::post('simpan_absen',[AbsenController::class, 'save_absen'])->name('simpan_absen');
Route::get('edit_absen/{id_absen}',[AbsenController::class, 'edit_absen'])->name('edit_absen');
Route::post('update_absen',[AbsenController::class, 'update_absen'])->name('update_absen');
Route::get('hapus_absen/{id_absen}',[AbsenController::class, 'hapus_absen'])->name('hapus_absen');

Route::get('nilai',[NilaiController::class, 'nilai'])->name('nilai');
Route::get('input_nilai',[NilaiController::class, 'input_nilai'])->name('input_nilai');
Route::get('rekap_nilai/{id?}/{semester?}',[NilaiController::class, 'rekap_nilai'])->name('rekap_nilai');
Route::get('cetak_nilai/{id?}/{semester?}',[NilaiController::class, 'cetak_nilai'])->name('cetak_nilai');
Route::post('save_nilai',[NilaiController::class, 'save_nilai'])->name('save_nilai');
Route::get('edit_nilai/{id_nilai}',[NilaiController::class, 'edit_nilai'])->name('edit_nilai');
Route::post('update_nilai',[NilaiController::class, 'update_nilai'])->name('update_nilai');
Route::get('hapus_nilai/{id_nilai}',[NilaiController::class, 'hapus_nilai'])->name('hapus_nilai');

Route::get('/',[Usercontroller::class, 'login'])->name('login');
Route::get('register',[Usercontroller::class, 'register'])->name('register');
Route::post('daftar',[Usercontroller::class, 'daftar'])->name('daftar');
Route::post('aksi_login',[Usercontroller::class, 'aksi_login'])->name('aksi_login');
Route::post('logout',[Usercontroller::class, 'logout'])->name('logout');
