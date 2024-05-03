<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\DataRuanganController;
use App\Http\Controllers\DataPinjamanController;

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

Route::get('/', function () {
    return view('auth/login');
});

//pinjam barang
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/create/{id}', [HomeController::class, 'create'])->name('create');
// Route::post('/store', [HomeController::class, 'store'])->name('store');

//pengadaan barang
// Route::get('/pengadaanbarang', [HomeController::class, 'pengadaanbarang'])->name('pengadaanbarang');
// Route::get('/pengadaanbarang/create/{id}', [HomeController::class, 'pengadaanbarang_create'])->name('pengadaanbarang-create');
// Route::post('/pengadaanbarang/store', [HomeController::class, 'pengadaanbarang_store'])->name('pengadaanbarang-store');

//auth
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register-process');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login-process');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');

//dashboard
Route::middleware('auth')->group(function () {

    //ptofile
    Route::get('/profile', [AuthController::class, 'index'])->name('profile');
    Route::put('/profile/update/{id}', [AuthController::class, 'update'])->name('profile-update');

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //databarang
    Route::get('/databarang', [DataBarangController::class, 'index'])->name('databarang');
    Route::get('/databarang/show/{id}', [DataBarangController::class, 'show'])->name('databarang-show');
    Route::get('/databarang/create', [DataBarangController::class, 'create'])->name('databarang-create');
    Route::post('/databarang/store', [DataBarangController::class, 'store'])->name('databarang-store');
    Route::get('/databarang/edit/{id}', [DataBarangController::class, 'edit'])->name('databarang-edit');
    Route::put('/databarang/update/{id}', [DataBarangController::class, 'update'])->name('databarang-update');
    Route::get('/databarang/delete/{id}', [DataBarangController::class, 'destroy'])->name('databarang-delete');
    Route::get('/databarang/exportexcel', [DataBarangController::class, 'exportexcel'])->name('databarang-exportexcel');
    Route::post('/databarang/importexcel', [DataBarangController::class, 'importexcel'])->name('databarang-importexcel');
    Route::get('/databarang/exportpdf', [DataBarangController::class, 'exportpdf'])->name('databarang-exportpdf');

    //dataruangan
    Route::get('/dataruangan', [DataRuanganController::class, 'index'])->name('dataruangan');
    Route::get('/dataruangan/create', [DataRuanganController::class, 'create'])->name('dataruangan-create');
    Route::post('/dataruangan/store', [DataRuanganController::class, 'store'])->name('dataruangan-store');
    Route::get('/dataruangan/edit/{id}', [DataRuanganController::class, 'edit'])->name('dataruangan-edit');
    Route::put('/dataruangan/update/{id}', [DataRuanganController::class, 'update'])->name('dataruangan-update');
    Route::get('/dataruangan/delete/{id}', [DataRuanganController::class, 'destroy'])->name('dataruangan-delete');
    Route::get('/dataruangan/exportexcel', [DataRuanganController::class, 'exportexcel'])->name('dataruangan-exportexcel');
    Route::get('/dataruangan/exportpdf', [DataRuanganController::class, 'exportpdf'])->name('dataruangan-exportpdf');

    //sumberdana
    Route::get('/sumberdana', [SumberDanaController::class, 'index'])->name('sumberdana');
    Route::get('/sumberdana/create', [SumberDanaController::class, 'create'])->name('sumberdana-create');
    Route::post('/sumberdana/store', [SumberDanaController::class, 'store'])->name('sumberdana-store');
    Route::get('/sumberdana/edit/{id}', [SumberDanaController::class, 'edit'])->name('sumberdana-edit');
    Route::put('/sumberdana/update/{id}', [SumberDanaController::class, 'update'])->name('sumberdana-update');
    Route::get('/sumberdana/delete/{id}', [SumberDanaController::class, 'destroy'])->name('sumberdana-delete');
    Route::get('/sumberdana/exportexcel', [SumberDanaController::class, 'exportexcel'])->name('sumberdana-exportexcel');
    Route::get('/sumberdana/exportpdf', [SumberDanaController::class, 'exportpdf'])->name('sumberdana-exportpdf');

    //datapinjaman
    // Route::get('/datapinjaman', [DataPinjamanController::class, 'index'])->name('datapinjaman');
    // Route::get('/datapinjaman/show/{id}', [DataPinjamanController::class, 'show'])->name('datapinjaman-show');
    // Route::get('/datapinjaman/create', [DataPinjamanController::class, 'create'])->name('datapinjaman-add');
    // Route::post('/datapinjaman/store', [DataPinjamanController::class, 'store'])->name('datapinjaman-store');
    // Route::get('/datapinjaman/edit/{id}', [DataPinjamanController::class, 'edit'])->name('datapinjaman-edit');
    // Route::put('/datapinjaman/update/{id}', [DataPinjamanController::class, 'update'])->name('datapinjaman-update');
    // Route::get('/datapinjaman/delete/{id}', [DataPinjamanController::class, 'destroy'])->name('datapinjaman-delete');
    // Route::get('/datapinjaman/exportexcel', [DataPinjamanController::class, 'exportexcel'])->name('datapinjaman-exportexcel');
    // Route::get('/datapinjaman/exportpdf', [DataPinjamanController::class, 'exportpdf'])->name('datapinjaman-exportpdf');

    //pengadaan
    // Route::get('/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan');
    // Route::get('/pengadaan/show/{id}', [PengadaanController::class, 'show'])->name('pengadaan-show');
    // Route::get('/pengadaan/create', [PengadaanController::class, 'create'])->name('pengadaan-create');
    // Route::post('/pengadaan/store', [PengadaanController::class, 'store'])->name('pengadaan-store');
    // Route::get('/pengadaan/edit/{id}', [PengadaanController::class, 'edit'])->name('pengadaan-edit');
    // Route::put('/pengadaan/update/{id}', [PengadaanController::class, 'update'])->name('pengadaan-update');
    // Route::get('/pengadaan/delete/{id}', [PengadaanController::class, 'destroy'])->name('pengadaan-delete');
    // Route::get('/pengadaan/exportexcel', [PengadaanController::class, 'exportexcel'])->name('pengadaan-exportexcel');
    // Route::get('/pengadaan/exportpdf', [PengadaanController::class, 'exportpdf'])->name('pengadaan-exportpdf');

});

