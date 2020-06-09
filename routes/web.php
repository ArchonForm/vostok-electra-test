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

Route::get('exportXLS', 'UsersController@exportXLS')->name('exportXLS');
Route::get('/exportPDF/{id}','UsersController@exportPDF');
