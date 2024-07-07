<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Userprofilecontroller;
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

Route::get('/', function () {
    return view('home');
});
Route::controller(LapanganController::class)->group(function(){
    Route::get('/jadwal-lapangan', 'jadwal');
    Route::get('/cari-jadwal/{date}/{lapangan}', 'CariJadwal');
    Route::get('/pesan-lapangan/view/{id}', 'PesananView');
    Route::get('/pesan-lapangan/create/{id}', 'BuatPesanan');
    Route::get('/pesan-lapangan/konfirmasi-pembayaran/{numInvoice}', 'BayarLapangan');
    Route::get('/detail-pesanan/{numInvoice}' , 'DetailPesananView');
});

Route::controller(PesananController::class)->group(function(){
    Route::post('/pesan-lapangan/create','PesananLapangan')->middleware('auth');
    Route::post('/konfirmasi-pembayaran/create','PembayaranLapangan')->middleware('auth');
    Route::get('/download-image/{numInvoice}', 'Download')->middleware(['auth','AuthAdmin']);
    Route::get('/terima-pesanan/{numInvoice}', 'TerimaPesanan')->middleware(['auth','AuthAdmin']);
    Route::get('/batalkan-pesanan/{numInvoice}', 'BatalkanPesanan')->middleware(['auth','AuthAdmin']);
    Route::get('/detail-pesanan/{numInvoice}', 'ViewDetailPesanan')->middleware(['auth','AuthAdmin']);

});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login','Authenticate')->middleware('guest');
    Route::post('/logout','Logout')->middleware('auth');
});

Route::controller(RegisterController::class)->middleware('guest')->group(function(){
    Route::get('/register','index');
    Route::post('/register/create','RegisterUser');
    Route::get('/register/add-picture/view/{id}','AddPict');
    Route::post('/register/add-picture','UploadImg');
    Route::get('/register/add-pict/skip/{id}','UploadImgDefault');
});

Route::controller(Userprofilecontroller::class)->middleware('auth')->group(function(){
    Route::get('/profile/view/{id}','index');
    Route::get('/profile/edit/{id}','EditProfile');
    Route::post('/profile/update','UpdateProfile');
    Route::get('/v/reset-password','ResetPassView');
    Route::get('/edit/change-password/view/{id}','EditPassword');
    Route::post('/change-password/update/{id}', 'UpdatePassword');
});



/* ==================== Route Halama Admin ================================== */
Route::controller(AdminController::class)->middleware(['auth','AuthAdmin'])->group(function(){
    Route::get('/admin/dashboard','index');
    Route::get('/admin/profile/view','ProfileView');
    Route::get('/admin/edit-profile/view','UbahProfileView');
    Route::post('admin/profile/edit','UbahProfileAdmin');
    Route::get('/ubah-password/admin/view','UbahPasswordView');
    Route::post('ubah-password/admin/edit','UbahPasswordAdmin');
    Route::get('/hapus-user/{id}', 'HapusUser');
});
Route::controller(DashboardController::class)->middleware(['auth','AuthAdmin'])->group(function(){

    Route::get('/admin/daftar-pesanan','DaftarPesananView');
    Route::get('/admin/pesanan/pesanan-masuk','PesananMasuk');
    Route::get('/admin/konfigurasi','KonfigurasiView');
    Route::get('/admin/daftar-user','DaftarUser');
    Route::get('admin/daftar-user/detail/{id}','DaftarUserDetailView');
    Route::get('/admin/user-reset-password/{id}','ResetPasswordUser');
    Route::get('/cari/daftar-user/{keyword}','CariDaftarUser');
});


