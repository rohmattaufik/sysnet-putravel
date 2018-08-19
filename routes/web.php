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
    return view('auth/login-admin');
});

Route::prefix('master')->group(function () {
    //master parameter
    Route::get('parameter', 'MasterParameterController@index');
    Route::prefix('parameter')->group(function () {
        Route::post('submit', 'MasterParameterController@store');
        Route::post('delete', 'MasterParameterController@delete');
        Route::get('edit/{id}', 'MasterParameterController@edit');
        Route::post('update', 'MasterParameterController@update');
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
    Route::get('sbu', 'MasterSBUController@index');
    Route::prefix('sbu')->group(function () {
        Route::post('submit', 'MasterSBUController@store');
        Route::post('delete', 'MasterSBUController@delete');
        Route::get('edit/{id}', 'MasterSBUController@edit');
        Route::post('update', 'MasterSBUController@update');
    });

    //master employee
    Route::get('employee', 'MasterEmployeeController@index');
    Route::prefix('employee')->group(function () {
        Route::post('submit', 'MasterEmployeeController@store');
        Route::post('delete', 'MasterEmployeeController@delete');
        Route::get('edit/{id}', 'MasterEmployeeController@edit');
        Route::post('update', 'MasterEmployeeController@update');
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
    Route::get('dipa', 'MasterDIPAController@index');
    Route::prefix('dipa')->group(function () {
        Route::post('submit', 'MasterDIPAController@store');
        Route::post('delete', 'MasterDIPAController@delete');
        Route::get('edit/{id}', 'MasterDIPAController@edit');
        Route::post('update', 'MasterDIPAController@update');
    });

});

Route::prefix('transaksi')->group(function () {
    //master parameter
    Route::get('surat-tugas', 'TransaksiSuratTugasController@index');
    Route::prefix('surat-tugas')->group(function () {
        Route::post('submit', 'TransaksiSuratTugasController@store');
        Route::post('delete', 'TransaksiSuratTugasController@delete');
        Route::get('edit/{id}', 'TransaksiSuratTugasController@edit');
        Route::post('update', 'TransaksiSuratTugasController@update');
    });

    //pesanan surat tugas
    Route::get('pesanan', 'TransaksiPesananController@index');
    // Route::prefix('surat-tugas')->group(function () {
    //     Route::post('submit', 'TransaksiSuratTugasController@store');
    //     Route::post('delete', 'TransaksiSuratTugasController@delete');
    //     Route::get('edit/{id}', 'TransaksiSuratTugasController@edit');
    //     Route::post('update', 'TransaksiSuratTugasController@update');
    // });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//jabatan
Route::get('position', 'MJabatanController@get_list');
Route::get('position/edit/{code}', 'MJabatanController@edit');
Route::post('position/edit/submit', 'MJabatanController@update');
Route::post('position/delete', 'MJabatanController@delete');
Route::post('position/create', 'MJabatanController@store');
