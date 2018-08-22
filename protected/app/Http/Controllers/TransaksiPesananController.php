<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDipa,
    App\Http\Controllers\TSuratTugas\TSuratTugasDListController as TPSuratTugasD,
    App\Http\Controllers\TSuratTugas\TSuratTugasHListController as TPSuratTugasH,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MEmployee\MEmployeeListController as MEmployee,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    Illuminate\Http\Request;
use Session;
use Auth;

class TransaksiPesananController extends Controller
{
    public function index() {
        $data_surat_tugas_h = (new TPSuratTugasH)->get_list();

//        dd($data_surat_tugas_h);

       return view('modul_transaksi/surat_tugas/pesanan_surat_tugas')
           ->with('data_surat_tugas_h',$data_surat_tugas_h)
           ;
    }

}
