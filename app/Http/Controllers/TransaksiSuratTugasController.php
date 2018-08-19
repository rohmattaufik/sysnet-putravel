<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDipa,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    Illuminate\Http\Request;
use Session;
use Auth;

class TransaksiSuratTugasController extends Controller
{
    public function index() {

        $data_kota = (new MKota)->get_list();
        $data_dipa = (new MDIPA)->get_list();
        $data_department = (new MDepartment)->get_list();

       return view('modul_transaksi/surat_tugas/surat_tugas')
           ->with('data_kota',$data_kota)
           ->with('data_dipa',$data_dipa)
           ->with('data_department',$data_department)
           ;
    }
}
