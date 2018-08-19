<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDipa,
    App\Http\Controllers\TSuratTugas\TSuratTugasDListController as TPSuratTugasD,
    App\Http\Controllers\TSuratTugas\TSuratTugasHListController as TPSuratTugasH,
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
        $data_surat_tugas_h = (new TPSuratTugasH)->get_list();
//        dd($data_surat_tugas_h);
       return view('modul_transaksi/surat_tugas/surat_tugas')
           ->with('data_kota',$data_kota)
           ->with('data_dipa',$data_dipa)
           ->with('data_department',$data_department)
           ->with('data_surat_tugas_h',$data_surat_tugas_h)
           ;
    }
    public function store(Request $request) {
        if (!is_null($request)) {
            $new_surat_tugasH                = new TPSuratTugasH();
            $new_surat_tugasH->start_date = $request->dari_tanggal;
            $new_surat_tugasH->end_date = $request->sampai_tanggal;
            $new_surat_tugasH->idKota = $request->kota;
            $new_surat_tugasH->idDIPA = $request->dipa;
            $new_surat_tugasH->description = $request->keterangan;
            $new_surat_tugasH->idDepartment = $request->department;
            $new_surat_tugasH->description_1 = $request->keterangan1;
            $new_surat_tugasH->created_by = Auth::user()->id;

            $new_surat_tugasH->create();
        }

        Session::flash('sukses',"Data Surat Tugas berhasil diinput.");
        return redirect()->back();
    }
}
