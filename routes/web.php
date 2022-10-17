<?php

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
//     return view('template.master');
// });

Route::get('login',[App\Http\Controllers\LoginController::class,'index']);
Route::post('login',[App\Http\Controllers\LoginController::class,'login']);

// Guest
Route::get('/',[App\Http\Controllers\LandingPageController::class,'index']);
Route::get('pesanticket/{id}',[App\Http\Controllers\PesanTicketController::class,'show']);
Route::post('pesanticket/{id}',[App\Http\Controllers\PesanTicketController::class,'pesan_ticket']);
Route::get('ticketkonfirmation',[App\Http\Controllers\TicketConfirmation::class,'show']);
Route::get('konfirmasipembayaran/{kode}',[App\Http\Controllers\TicketConfirmation::class,'pembayaran']);
Route::post('konfirmasipembayaran/{kode}',[App\Http\Controllers\TicketConfirmation::class,'konfirmasi_pembayaran']);

Route::get('ticket/{nama_event}/{kode}',[App\Http\Controllers\TicketController::class,'index']);


Route::get('getkota/{id}',[App\Http\Controllers\KotaController::class,'kota']);




Auth::routes(['login'=>false,'register'=>false]);


Route::middleware(['role:admin,staff'])->group(function () {

    Route::resource('usermanagement',App\Http\Controllers\Admin\UserController::class);
    Route::resource('kategorimanagement',App\Http\Controllers\Admin\KategoriEventController::class);

    Route::get('pesananticket',[App\Http\Controllers\Staff\PesananTicketController::class,'index']);
    Route::get('konfirmasipesanan/diterima/{id}',[App\Http\Controllers\Staff\KonfirmasiPesananController::class,'diterima']);
    Route::get('konfirmasipesanan/ditolak/{id}',[App\Http\Controllers\Staff\KonfirmasiPesananController::class,'ditolak']);

});

Route::middleware(['role:admin,staff,owner'])->group(function () {
    Route::resource('scanticket',App\Http\Controllers\Staff\ScanTicketController::class);
    Route::resource('eventmanagement',App\Http\Controllers\Staff\EventController::class);
    Route::get('jenisticketmanagement',[App\Http\Controllers\Staff\BuatTicketController::class,'index']);
    Route::post('jenisticketmanagement/{id}',[App\Http\Controllers\Staff\BuatTicketController::class,'tambah']);
    Route::post('jenisticketmanagement/edit/{id}',[App\Http\Controllers\Staff\BuatTicketController::class,'ubah']);
    Route::post('jenisticketmanagement/hapus/{id}',[App\Http\Controllers\Staff\BuatTicketController::class,'hapus']);

    Route::get('hapusfotobanner/{id}',[App\Http\Controllers\Staff\EventController::class,'hapus_foto_banner']);

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
