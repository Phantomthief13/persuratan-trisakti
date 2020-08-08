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
Route::get('/', 'LoginController@main');
Route::get('/main', 'LoginController@index');
Route::post('/login/LoginPost', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout');


Route::get('/surat_masuk', 'SuratMasukController@index');
Route::post('/surat_masuk/store', 'SuratMasukController@store');
Route::get('/surat_masuk/tambah', 'SuratMasukController@create');
Route::get('/surat_masuk/edit/{id}', 'SuratMasukController@edit');
Route::put('/surat_masuk/update/{id}', 'SuratMasukController@update');
Route::get('/surat_masuk/delete/{id}', 'SuratMasukController@delete');
Route::get('surat_masuk/detail/{id}', 'SuratMasukController@detail');
Route::get('/surat_masuk/kirim/{id}', 'SuratMasukController@kirim');
Route::get('surat_masuk/cari', 'SuratMasukController@cari');

Route::get('/surat_masuk/Download/{id}', 'SuratMasukController@download')->name('download');

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/tambah', 'PegawaiController@create');
Route::post('/pegawai/store', 'PegawaiController@store');
Route::get('/pegawai/detail/{id}', 'PegawaiController@detail');
Route::get('/pegawai/edit/{id}', 'PegawaiController@edit');
Route::post('/pegawai/update/{id}', 'PegawaiController@update');
Route::get('/pegawai/delete/{id}', 'PegawaiController@delete');
Route::get('/pegawai/cari', 'PegawaiController@cari');

Route::get('/surat_keluar', 'SuratKeluarController@index');
Route::get('/surat_keluar/tambah', 'SuratKeluarController@create');
Route::post('/surat_keluar/store', 'SuratKeluarController@store');
Route::get('/surat_keluar/edit/{id}', 'SuratKeluarController@edit');
Route::post('/surat_keluar/update/{id}', 'SuratKeluarController@update');
Route::get('/surat_keluar/detail/{id}', 'SuratKeluarController@detail');
Route::get('/surat_keluar/delete/{id}', 'SuratKeluarController@delete');
Route::get('/surat_keluar/send/{id}', 'SuratKeluarController@send');
Route::get('/surat_keluar/cari', 'SuratKeluarController@cari');


Route::get('/disposisi', 'DisposisiController@index');
Route::get('/disposisi/tambah/{id}', 'DisposisiController@tambah');
Route::post('/disposisi/store/{id}', 'DisposisiController@store');
Route::get('/disposisi/edit/{id}', 'DisposisiController@edit');
Route::post('/disposisi/update/{id}', 'DisposisiController@update');
Route::get('/disposisi/delete/{id}', 'DisposisiController@delete');
Route::get('/disposisi/detail/{id}', 'DisposisiController@detail');
Route::get('/disposisi/cari', 'DisposisiController@cari');

Route::get('/disposisi/Download/{id}', 'DisposisiController@download')->name('disdownload');

Route::get('/verifikasi', 'VerifikasiController@index');
Route::get('/verifikasi/verif/{id}', 'VerifikasiController@verif');
Route::post('/verifikasi/store/{id}', 'VerifikasiController@store');
Route::get('/verifikasi/edit/{id}', 'VerifikasiController@edit');
Route::post('/verifikasi/update/{id}', 'VerifikasiController@update');
Route::get('/verifikasi/detail/{id}', 'VerifikasiController@detail');
Route::get('/verifikasi/cari', 'VerifikasiController@cari');

Route::get('/chart', 'ChartController@index');

Route::post('/Document/{id}', 'DocumentController@create');