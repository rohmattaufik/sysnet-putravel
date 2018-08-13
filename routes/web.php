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

Route::get('/', function () {
    return view('home-admin');
});

Route::prefix('master')->group(function () {
    Route::get('parameter', function () {
        return view('modul_master/master-parameter');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


