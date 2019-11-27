<?php

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

Route::get('/', 'ReportController@index');
Route::post('/cari', 'ReportController@cari');
Route::get('/kisel_baru', 'KiselBaruController@index');
Route::post('/cari_kisel', 'KiselBaruController@cari');
Route::get('/kisel_selisih', 'KiselSelisihController@index');
Route::post('/cari_kisel_selisih', 'KiselSelisihController@cari');
Route::get('/hitung_nirwana', 'HitungNirwanaController@index');
Route::post('/cari_nirwana', 'HitungNirwanaController@cari');
Route::get('/nirwana_oto', 'NirwanaOtoController@index');
Route::post('/cari_nirwana_oto', 'NirwanaOtoController@cari');
route::get('/cetak_pdf', 'ReportController@cetak_pdf');
Route::get('/report/export_excel', 'ReportController@export_excel');
Route::get('/cari/export_excel', 'ReportController@export_excel');
Route::get('/kisel_baru/export_excel', 'KiselBaruController@export_excel');
Route::get('/cari_kisel/export_excel', 'KiselBaruController@export_excel');
Route::get('/kisel_selisih/export_excel', 'KiselSelisihController@export_excel');
Route::get('/cari_kisel_selisih/export_excel', 'KiselSelisihController@export_excel');
Route::get('/nirwana_oto/export_excel', 'NirwanaOtoController@export_excel');
Route::get('/cari_nirwana_oto/export_excel', 'NirwanaOtoController@export_excel');
Route::get('/hitung_nirwana/export_excel', 'HitungNirwanaController@export_excel');
Route::get('/hitung_nirwana/export_excel', 'HitungNirwanaController@export_excel');
