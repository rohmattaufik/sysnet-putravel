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
    if(is_null(Auth::user())) {
        return view('auth/login-admin');
    } else {
        return redirect(url(action('HomeController@index')));
    }
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
    //Transaksi Surat Tugas
    Route::get('surat-tugas', 'TransaksiSuratTugasController@index');
    Route::prefix('surat-tugas')->group(function () {
        Route::post('submit', 'TransaksiSuratTugasController@store');
        Route::post('delete', 'TransaksiSuratTugasController@delete');
        Route::get('edit/{id}', 'TransaksiSuratTugasController@edit');
        Route::post('update', 'TransaksiSuratTugasController@update');
    });

    //Transaksi Pesan Tiket
    Route::get('pesan-tiket/{id}', 'TransaksiPesanTiketController@index');
    Route::prefix('pesan-tiket')->group(function () {
        Route::post('submit', 'TransaksiPesanTiketController@store');
        Route::post('delete', 'TransaksiPesanTiketController@delete');
        Route::get('edit/{id}', 'TransaksiPesanTiketController@edit');
        Route::post('update', 'TransaksiPesanTiketController@update');
    });

    //pesanan surat tugas
    Route::get('pesanan', 'TransaksiPesananController@index');
    // Route::prefix('surat-tugas')->group(function () {
    //     Route::post('submit', 'TransaksiSuratTugasController@store');
    //     Route::post('delete', 'TransaksiSuratTugasController@delete');
    //     Route::get('edit/{id}', 'TransaksiSuratTugasController@edit');
    //     Route::post('update', 'TransaksiSuratTugasController@update');
    // });

    //Transaksi Pesan Hotwl
    Route::get('pesan-hotel/{id}', 'TransaksiPesanHotelController@index');
    Route::prefix('pesan-hotel')->group(function () {
        Route::post('submit', 'TransaksiPesanHotelController@store');
        // Route::post('delete', 'TransaksiPesanTiketController@delete');
        // Route::get('edit/{id}', 'TransaksiPesanTiketController@edit');
        // Route::post('update', 'TransaksiPesanTiketController@update');
    });

    //Transaksi Pesan Kota
    Route::get('pesan-kota/{id}', 'TransaksiPesanKotaController@index');
    Route::prefix('pesan-kota')->group(function () {
        Route::post('submit', 'TransaksiPesanKotaController@store');
        // Route::post('delete', 'TransaksiPesanTiketController@delete');
        // Route::get('edit/{id}', 'TransaksiPesanTiketController@edit');
        // Route::post('update', 'TransaksiPesanTiketController@update');
    });
});


Route::prefix('konfirmasi')->group(function () {
    //Konfirmasi Hotel
    Route::get('hotel', 'KonfirmasiHotelController@index');
    Route::prefix('hotel')->group(function () {
        Route::post('submit', 'KonfirmasiHotelController@store');
//        Route::post('delete', 'KonfirmasiHotelController@delete');
//        Route::get('edit/{id}', 'KonfirmasiHotelController@edit');
//        Route::post('update', 'KonfirmasiHotelController@update');
    });

    //Konfirmasi Tiket
    Route::get('tiket', 'KonfirmasiTiketController@index');
    Route::prefix('tiket')->group(function () {
        Route::post('submit', 'KonfirmasiTiketController@store');
        Route::post('delete', 'KonfirmasiTiketController@delete');
        Route::get('edit/{id}', 'KonfirmasiTiketController@edit');
        Route::post('update', 'KonfirmasiTiketController@update');
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

Route::prefix('konfirmasi-pembayaran')->group(function () {

    //Konfirmasi Pembayaran Tiket
    Route::get('tiket', 'KonfirmasiPembayaranTiketController@index');
    Route::prefix('tiket')->group(function () {
        Route::post('pilih', 'KonfirmasiPembayaranTiketController@pilihjenis');
        Route::post('submit', 'KonfirmasiPembayaranTiketController@store');
        Route::post('delete', 'KonfirmasiPembayaranTiketController@delete');
        Route::get('edit/{id}', 'KonfirmasiPembayaranTiketController@edit');
        Route::post('update', 'KonfirmasiPembayaranTiketController@update');
    });

    //Konfirmasi Pembayaran Hotel
    Route::get('hotel', 'KonfirmasiPembayaranHotelController@index');
    Route::prefix('hotel')->group(function () {
        Route::post('submit', 'KonfirmasiPembayaranHotelController@store');
        Route::post('delete', 'KonfirmasiPembayaranHotelController@delete');
        Route::get('edit/{id}', 'KonfirmasiPembayaranHotelController@edit');
        Route::post('update', 'KonfirmasiPembayaranHotelController@update');
    });
});

Route::prefix('pelunasan-piutang')->group(function () {

    //Konfirmasi Pembayaran Tiket
    Route::get('tiket', 'PelunasanPiutangTiketController@index');
    Route::prefix('tiket')->group(function () {
        Route::post('pilih', 'PelunasanPiutangTiketController@pilihjenis');
        Route::post('submit', 'PelunasanPiutangTiketController@store');
        Route::post('delete', 'PelunasanPiutangTiketController@delete');
        Route::get('edit/{id}', 'PelunasanPiutangTiketController@edit');
        Route::post('update', 'PelunasanPiutangTiketController@update');
    });

    //Konfirmasi Pembayaran Hotel
//    Route::get('hotel', 'KonfirmasiPembayaranHotelController@index');
//    Route::prefix('hotel')->group(function () {
//        Route::post('submit', 'KonfirmasiPembayaranHotelController@store');
//        Route::post('delete', 'KonfirmasiPembayaranHotelController@delete');
//        Route::get('edit/{id}', 'KonfirmasiPembayaranHotelController@edit');
//        Route::post('update', 'KonfirmasiPembayaranHotelController@update');
//    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//jabatan
Route::get('position', 'MJabatanController@get_list');
Route::get('position/edit/{code}', 'MJabatanController@edit');
Route::post('position/edit/submit', 'MJabatanController@update');
Route::post('position/delete', 'MJabatanController@delete');
Route::post('position/create', 'MJabatanController@store');

// Route::get('pesan_hotel', function(){
//     return view('modul_transaksi/surat_tugas/pesan_hotel');
// });

// Route::get('pesan_hotel/{id}', 'TransaksiPesanHotelController@index');

// Route::post('pesan_hotel/create', 'TransaksiPesanHotelController@store');
