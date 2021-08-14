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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::get('dashboard', 'DashboaradController@index')->name('dashboard');
        Route::get('report-kasir/{id}', 'DetailReportController@reportKasir')->name('report.kasir');
        Route::get('report-gudang/{id}', 'DetailReportController@reportGudang')->name('report.gudang');
});