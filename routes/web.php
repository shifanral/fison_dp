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
//     return view('welcome');
// });

Route::get('/', 'GuestController@index')->name('guest.index');
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/pelanggan', 'AdminController@pelanggan')->name('admin.pelanggan');
    Route::get('/produk', 'AdminController@produk')->name('admin.produk');
    Route::post('/produk', 'AdminController@store_product')->name('admin.store_product');
    Route::get('/produk/{id}/edit', 'AdminController@edit_produk')->name('admin.edit_produk');
    Route::put('/produk/{id}', 'AdminController@update_produk')->name('admin.update_produk');
    Route::delete('/produk/{id}', 'AdminController@delete_produk')->name('admin.delete_produk');
    Route::get('/pesanan', 'AdminController@pesanan')->name('admin.pesanan');
    Route::get('/pesanan/{id}', 'AdminController@detail_pesanan')->name('admin.detail_pesanan');
    Route::put('/pesanan/{id}', 'AdminController@update_pesanan')->name('admin.update_pesanan');
    Route::get('/edit_kata_sandi/', 'AdminController@edit_kata_sandi')->name('admin.edit_kata_sandi');
    Route::put('/update_kata_sandi/{id_user}', 'AdminController@update_kata_sandi')->name('admin.update_kata_sandi');
});

Route::group(['prefix' => 'pelanggan', 'middleware' => 'pelanggan'], function(){
    Route::get('/', 'PelangganController@index')->name('pelanggan.index');
    Route::get('/produk', 'PelangganController@produk')->name('pelanggan.produk');
    Route::get('/produk/{id}/beli', 'PelangganController@beli_produk')->name('pelanggan.beli_produk');
    Route::post('/produk/{id}', 'PelangganController@save_order')->name('pelanggan.save_order');
    Route::get('/pesanan', 'PelangganController@pesanan')->name('pelanggan.pesanan');
    Route::get('/pesanan/{id}', 'PelangganController@detail_order')->name('pelanggan.detail_order');
    Route::post('/pesanan/{id}', 'PelangganController@update_order')->name('pelanggan.update_order');
});

Route::get('/home', 'HomeController@index')->name('home');
