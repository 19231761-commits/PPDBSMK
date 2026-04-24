<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendaftaranSantriController;
use App\Http\Controllers\PembayaransantriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PemesananBajuController;
use App\Models\PendaftaranSantri;

Route::get('/', function () {
    return redirect()->route('backend.login');
});
Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])
    ->name('backend.beranda')->middleware('auth');

Route::get('backend/login', [LoginController::class, 'loginBackend'])
    ->name('backend.login');
Route::post('backend/login', [LoginController::class, 'authenticateBackend'])
    ->name('backend.login.authenticate');
Route::get('backend/register', [RegisterController::class, 'create'])
    ->name('backend.register');
Route::post('backend/register', [RegisterController::class, 'store'])
    ->name('backend.register.store');
Route::get('backend/login/logout', [LoginController::class, 'logoutBackend'])
    ->name('backend.login.logout'); // Ini sudah benar
Route::get('backend/logout', [LoginController::class, 'logoutBackend'])
    ->name('backend.v_login.logout')
    ->middleware('auth');

// Route untuk User
Route::resource('backend/user', UserController::class, ['as' => 'backend'])
    ->middleware('auth');

// Route untuk Data Pendaftaran Siswa
Route::resource('backend/pendaftaransantri', PendaftaranSantriController::class, ['as' => 'backend'])
    ->middleware('auth');

Route::get('backend/pendaftaran-saya', [PendaftaranSantriController::class, 'create'])
    ->name('backend.pendaftaran.form')
    ->middleware('auth');

Route::get('backend/form-pemesanan-baju', [PemesananBajuController::class, 'create'])
    ->name('backend.pemesanan.baju')
    ->middleware('auth');
Route::post('backend/form-pemesanan-baju', [PemesananBajuController::class, 'store'])
    ->name('backend.pemesanan.baju.store')
    ->middleware('auth');

Route::view('backend/form-pemesanan-buku', 'backend.v_pemesanan_buku.index', [
    'judul' => 'Form Pemesanan Buku',
])->name('backend.pemesanan.buku')->middleware('auth');

//Route untuk data pendaftaran siswa untuk pemilik    
Route::get('backend/pemilik/pendaftaran', [PendaftaranSantriController::class, 'pemilik'])
    ->name('backend.pemilik.data')
    ->middleware('auth');

// Untuk Pembayaran
Route::get('backend/pemilik/pembayaran', [PembayaransantriController::class, 'pemilik'])
    ->name('backend.pemilik.pembayaran')
    ->middleware('auth');

//Data Pembayaran siswa pdf
Route::get('backend/pembayaransantri/export/pdf', [PembayaransantriController::class, 'exportPDF'])
    ->name('backend.pembayaransantri.export.pdf')
    ->middleware('auth');

//Data Pendaftaran siswa pdf
Route::get('/pendaftaran-siswa/export/excel', [PendaftaranSantriController::class, 'exportExcel'])->name('backend.pendaftaransantri.export.excel');
Route::get('/pendaftaran-siswa/export/pdf', [PendaftaranSantriController::class, 'exportPDF'])->name('backend.pendaftaransantri.export.pdf');

// Route untuk Data Pembayaran Siswa
Route::post('backend/pembayaransantri/{id}/bayar', [PembayaransantriController::class, 'bayar'])
    ->name('backend.pembayaransantri.bayar')
    ->middleware('auth');

Route::resource('backend/pembayaransantri', PembayaransantriController::class, ['as' => 'backend'])
    ->middleware('auth');


// Route untuk Data Pengumuman Siswa
Route::resource('backend/pengumuman', PengumumanController::class, ['as' => 'backend'])
    ->middleware('auth');
Route::get('/pengumuman/export-teks', [PengumumanController::class, 'exportPengumumanTeks'])->name('backend.pengumuman.export-teks');