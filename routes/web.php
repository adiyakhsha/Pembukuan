<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@showLogin')->name('login');
Route::post('/', 'UserController@login')->name('postLogin');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::resource('pemasukan', 'PemasukanController');

Route::resource('pengeluaran', 'PengeluaranController');

Route::resource('transaksi', 'TransaksiController');

Route::resource('stok', 'StokController');

Route::resource('inventaris', 'InventarisController');

Route::resource('labarugi', 'LabarugiController');