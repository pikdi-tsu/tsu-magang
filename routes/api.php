<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProgramMagangController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TranskripMagangController;
use App\Http\Controllers\UsulanKonversiController;

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::post('/store', [MahasiswaController::class, 'store']);
    Route::get('/{nim}', [MahasiswaController::class, 'show']);
    Route::put('/update/{nim}', [MahasiswaController::class, 'update']);
    Route::delete('/delete/{nim}', [MahasiswaController::class, 'destroy']);
});

Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index']);
    Route::post('/store', [DosenController::class, 'store']);
    Route::get('/{nidn}', [DosenController::class, 'show']);
    Route::put('/update/{nidn}', [DosenController::class, 'update']);
    Route::delete('/delete/{nidn}', [DosenController::class, 'destroy']);
});

Route::prefix('mitra')->group(function () {
    Route::get('/', [MitraController::class, 'index']);
    Route::post('/store', [MitraController::class, 'store']);
    Route::get('/{id_mitra}', [MitraController::class, 'show']);
    Route::put('/update/{id_mitra}', [MitraController::class, 'update']);
    Route::delete('/delete/{id_mitra}', [MitraController::class, 'destroy']);
});

Route::prefix('programmagang')->group(function () {
    Route::get('/', [ProgramMagangController::class, 'index']);
    Route::post('/store', [ProgramMagangController::class, 'store']);
    Route::get('/{id_program}', [ProgramMagangController::class, 'show']);
    Route::put('/update/{id_program}', [ProgramMagangController::class, 'update']);
    Route::delete('/delete/{id_program}', [ProgramMagangController::class, 'destroy']);
});

Route::prefix('pendaftaran')->group(function () {
    Route::get('/', [PendaftaranController::class, 'index']);
    Route::post('/store', [PendaftaranController::class, 'store']);
    Route::get('/{nim}', [PendaftaranController::class, 'show']);
    Route::put('/update/{nim}', [PendaftaranController::class, 'update']);
    Route::delete('/delete/{nim}', [PendaftaranController::class, 'destroy']);
});

Route::prefix('pembimbing')->group(function () {
    Route::get('/', [PembimbingController::class, 'index']);
    Route::post('/store', [PembimbingController::class, 'store']);
    Route::get('/{nidn}', [PembimbingController::class, 'show']);
    Route::put('/update/{nidn}', [PembimbingController::class, 'update']);
    Route::delete('/delete/{nidn}', [PembimbingController::class, 'destroy']);
});

Route::prefix('logbook')->group(function () {
    Route::get('/', [LogbookController::class, 'index']);
    Route::post('/store', [LogbookController::class, 'store']);
    Route::get('/{nim}', [LogbookController::class, 'show']);
    Route::put('/update/{nim}', [LogbookController::class, 'update']);
    Route::delete('/delete/{nim}', [LogbookController::class, 'destroy']);
});

Route::prefix('laporan')->group(function () {
    Route::get('/', [LaporanController::class, 'index']);
    Route::post('/store', [LaporanController::class, 'store']);
    Route::get('/{id_laporan}', [LaporanController::class, 'show']);
    Route::put('/update/{id_laporan}', [LaporanController::class, 'update']);
    Route::delete('/delete/{id_laporan}', [LaporanController::class, 'destroy']);
});

Route::prefix('penilaian')->group(function () {
    Route::get('/', [PenilaianController::class, 'index']);
    Route::post('/store', [PenilaianController::class, 'store']);
    Route::get('/{nim}', [PenilaianController::class, 'show']);
    Route::put('/update/{nim}', [PenilaianController::class, 'update']);
    Route::delete('/delete/{nim}', [PenilaianController::class, 'destroy']);
});

Route::prefix('matakuliah')->group(function () {
    Route::get('/', [MataKuliahController::class, 'index']);
    Route::post('/store', [MataKuliahController::class, 'store']);
    Route::get('/{id_matkul}', [MataKuliahController::class, 'show']);
    Route::put('/update/{id_matkul}', [MataKuliahController::class, 'update']);
    Route::delete('/delete/{id_matkul}', [MataKuliahController::class, 'destroy']);
});

Route::prefix('transkripmagang')->group(function () {
    Route::get('/', [TranskripMagangController::class, 'index']);
    Route::post('/store', [TranskripMagangController::class, 'store']);
    Route::get('/{id_transkrip}', [TranskripMagangController::class, 'show']);
    Route::put('/update/{id_transkrip}', [TranskripMagangController::class, 'update']);
    Route::delete('/delete/{id_transkrip}', [TranskripMagangController::class, 'destroy']);
});

Route::prefix('usulankonversi')->group(function () {
    Route::get('/', [UsulanKonversiController::class, 'index']);
    Route::post('/store', [UsulanKonversiController::class, 'store']);
    Route::get('/{nim}', [UsulanKonversiController::class, 'show']);
    Route::put('/update/{nim}', [UsulanKonversiController::class, 'update']);
    Route::delete('/delete/{nim}', [UsulanKonversiController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
