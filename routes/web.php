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
    //master parameter
    Route::get('parameter', function () {
        return view('modul_master/master-parameter');
    });

    // master data
    Route::get('data', 'MasterDataController@index');
    Route::prefix('data')->group(function () {
        Route::post('submit', 'MasterDataController@store');
        Route::post('delete', 'MasterDataController@delete');
        Route::get('edit/{jenis_data}/{id}', 'MasterDataController@edit');
        Route::post('update', 'MasterDataController@update');
    });

    //master sbu
    Route::get('sbu', function () {
        return view('modul_master/master-sbu');
    });

    //master employee
    Route::get('employee', function () {
        return view('modul_master/master-employee');
    });

    //master supplier
    Route::get('supplier', 'MasterSupplierController@index');
    Route::prefix('supplier')->group(function () {
        Route::post('submit', 'MasterSupplierController@store');
        Route::post('delete', 'MasterSupplierController@delete');
        Route::get('edit/{id}', 'MasterSupplierController@edit');
        Route::post('update', 'MasterSupplierController@update');
    });

    //master dipa
    Route::get('dipa', function () {
        return view('modul_master/master-dipa');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//jabatan
Route::get('position', 'MJabatanController@get_list');
Route::get('position/edit/{code}', 'MJabatanController@edit');
Route::post('position/edit/submit', 'MJabatanController@update');
Route::post('position/delete', 'MJabatanController@delete');
Route::post('position/create', 'MJabatanController@store');
