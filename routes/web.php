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
    Route::get('data', function () {
        return view('modul_master/master-data');
    });
    Route::get('sbu', function () {
        return view('modul_master/master-sbu');
    });
    Route::get('employee', function () {
        return view('modul_master/master-employee');
    });
    Route::get('supplier', function () {
        return view('modul_master/master-supplier');
    });

    // Route::get('supplier', 'SupplierController@index');

    Route::get('dipa', function () {
        return view('modul_master/master-dipa');
    });

    Route::post('supplier/create','MSupplierController@insert');

    Route::post('data/jabatan/create','MJabatanController@insert');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//jabatan
Route::get('position', 'MJabatanController@get_list');
Route::get('position/edit/{code}', 'MJabatanController@edit');
Route::post('position/edit/submit', 'MJabatanController@update');
Route::post('position/delete', 'MJabatanController@delete');
Route::post('position/create', 'MJabatanController@store');
