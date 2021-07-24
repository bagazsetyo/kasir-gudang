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

Route::prefix('admin')
    ->middleware(['auth:sanctum', 'verified', 'admin'])
    ->group(function () {
        Route::group(['as' => 'admin.'],function(){
            Route::get('dashboard', function(){
                return view('dashboard');
            })->name('dashboards');
        });
});

Route::prefix('user')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::group(['as' => 'user.'],function(){
            Route::get('dashboard', function(){
                return view('dashboard');
            })->name('dashboard');
        });
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');