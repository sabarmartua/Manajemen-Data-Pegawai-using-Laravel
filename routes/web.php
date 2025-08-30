<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\EselonController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;


//Auth
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard
Route::get('/dashboard', function () {return view('dashboard');})->middleware('auth')->name('dashboard');

// Agama
Route::resource('agama', AgamaController::class)->middleware('auth');

// Jabatan
Route::resource('jabatan', JabatanController::class)->middleware('auth');

// Golongan
Route::resource('golongan', GolonganController::class)->middleware('auth');

// Eselon
Route::resource('eselon', EselonController::class)->middleware('auth');

// Unit Kerja
Route::resource('unit_kerja', UnitKerjaController::class)->middleware('auth');

// Pegawai
Route::get('pegawai/export/csv', [PegawaiController::class, 'exportCsv'])->name('pegawai.export.csv')->middleware('auth');
Route::resource('pegawai', PegawaiController::class)->middleware('auth');

