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
    return redirect('/users');
});

Route::resource('/users', 'UsersController');

Route::get('export_xls', 'UsersController@exportXLS')->name('export_xls');
Route::get('/export_pdf/{id}','UsersController@exportPDF');
Route::get('/store_pdf/{id}','UsersController@storePDF');



