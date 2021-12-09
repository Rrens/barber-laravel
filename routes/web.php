<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Customer\LocationController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\BarberController;
use App\Http\Controllers\Customer\OrderController;
// use App\Http\Controllers\Customer\CartController;
// use App\Http\Controllers\Customer\CheckoutController;
// use App\Http\Controllers\Customer\HistoryController;
// use App\Http\Controllers\Admin\TransaksiController;

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

// Route::view('/', 'welcome');
Route::resource('home', HomeController::class);
Route::get('/', [HomeController::class, 'index']);
// Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/appointment', [HomeController::class, 'appointment']);

Route::group([
    'middleware' => ['auth' => 'CheckRole:customer']
], function () {
    // cart = MENENTUKAN BARBER & WAKTU RESERVASI = OrderController
    Route::resource('/cart', LocationController::class);
    Route::post('/location/{id}', [LocationController::class, 'location'])->name('location');

    // checkout = PILIH LAYANAN = ReservasiController
    Route::resource('order', OrderController::class);
    Route::get('order/{id}', [OrderController::class, 'kurir']);
    // Buat menghitung Layanan dan menghitung durasi
    Route::post('jasa', [OrderController::class, 'jasa'])->name('jasa');

    // Pesan
    Route::resource('history', HistoryController::class);



    // //Transaksi
    // Route::get('transaksi/{id_barber}', [TransaksiController::class, 'barber']);
    // Route::get('transaksi/{id_barber}', [TransaksiController::class, 'show']);

    // //gawe jupuk nilai id_barber

    // // Route::resource('transaksi', TransaksiController::class);
    // // Route::get('transaksi/step-one', 'TransaksiController@stepOne')->name('Transaksi.create.step.one');
    // Route::get('transaksi/step-one', [TransaksiController::class, 'stepOne'])->name('stepOne');
    // // Route::post('transaksi/step-one', 'TransaksiController@postCreateStepOne')->name('Transaksi.create.step.one.post');
    // Route::post('transaksi/step-one', [TransaksiController::class, 'postStepOne'])->name('poststepone');

    // // Route::get('transaksi/step-two', 'TransaksiController@stepTwo')->name('Transaksi.create.step.two');
    // Route::get('transaksi/step-two', [TransaksiController::class, 'stepOne'])->name('stepTwo');
    // // Route::post('transaksi/step-two', 'TransaksiController@postCreateStepTwo')->name('Transaksi.create.step.two.post');
    // Route::post('transaksi/step-two', [TransaksiController::class, 'postCreateStepOne'])->name('postCreateStepOne');

    // Route::get('transaksi/step-three', 'TransaksiController@stepThree')->name('Transaksi.create.step.three');
    // Route::post('transaksi/step-three', 'TransaksiController@postCreateStepThree')->name('Transaksi.create.step.three.post');
});

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth',
], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
    Route::post('/register',  [RegisterController::class, 'store'])->name('register');
    Route::view('/profile', 'pages.auth.profile')->name('profile');
});




Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth' => 'CheckRole:admin']
], function () {
    Route::resource('layanan', LayananController::class);
    Route::resource('barber', BarberController::class);
    // Route::resource('barber', [BarberController::class, 'index2']);
    // Route::resource('transaksi', TransaksiController::class);
});
