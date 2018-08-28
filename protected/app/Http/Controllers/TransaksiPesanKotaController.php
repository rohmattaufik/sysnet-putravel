<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDipa,
    App\Http\Controllers\TSuratTugas\TSuratTugasDListController as TPSuratTugasD,
    App\Http\Controllers\TSuratTugas\TSuratTugasHListController as TPSuratTugasH,
    App\Http\Controllers\TPesananHotel\TPesananHotelHListController as TPesananHotelH,
    App\Http\Controllers\TPesananHotel\TPesanHotelDListController as TPesananHotelD,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MSupplier\MSupplierListController as MSupplier,
    App\Http\Controllers\MEmployee\MEmployeeListController as MEmployee,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    App\Http\Controllers\MSBU\MSBUListController as MSBU,
    App\Http\Controllers\MSetNumber\MSetNumberListController as MSetNumber,
    Illuminate\Http\Request;
use Session;
use Auth;

class TransaksiPesanKotaController extends Controller
{
  public function index( $id_surat_tugas ) {

      $data_kota = (new MKota)->get_list();
      $data_supplier = (new MSupplier)->get_list();
      $data_surat_tugas_h = (new TPSuratTugasH)->get_surat_tugas_H( $id_surat_tugas );

     return view('modul_transaksi/pesan_kota/pesan_kota')
         ->with('data_kota',$data_kota)
         ->with('data_supplier',$data_supplier)
         ->with('data_surat_tugas',$data_surat_tugas_h);
  }

}
