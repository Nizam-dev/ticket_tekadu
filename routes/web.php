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


Route::get('/',[App\Http\Controllers\LandingPageController::class,'index']);
Route::get('pesanticket',[App\Http\Controllers\PesanTicketController::class,'index']);

Route::resource('/usermanagement',App\Http\Controllers\Admin\UserController::class);

Route::resource('/eventmanagement',App\Http\Controllers\Staff\EventController::class);
Route::resource('/scanticket',App\Http\Controllers\Staff\ScanTicketController::class);
