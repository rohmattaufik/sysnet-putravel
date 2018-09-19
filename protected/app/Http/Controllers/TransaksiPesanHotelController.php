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
use Carbon;

class TransaksiPesanHotelController extends Controller
{
    public function index( $id_surat_tugas ) {

        $data_surat_tugas_h = (new TPSuratTugasH)->get_surat_tugas_H( $id_surat_tugas );
        $data_kota = (new MSupplier)->get_hotel_by_town($data_surat_tugas_h[0]['idKota']);

        $end_date = new Carbon($data_surat_tugas_h[0]['end_date']);
        $start_date = new Carbon($data_surat_tugas_h[0]['start_date']);
        $difference = ($end_date->diff($start_date)->days < 1)
            ? 'today'
            : $end_date->diffInDays($start_date);
 
       return view('modul_transaksi/surat_tugas/pesan_hotel/pesan_hotel')
           ->with('data_kota',$data_kota)
           ->with('data_surat_tugas',$data_surat_tugas_h)
           ->with('different',$difference);
    }


    public function store(Request $request) {

        if (!is_null($request)) {
            $data_surat_tugas_h = (new TPSuratTugasH)->get_surat_tugas_H( $request->id_surat_tugas );
            $generate_number = (new MSetNumber)->generateNumber("Pesan Hotel");

            $check_hotel_h   = DB::table('TPesananHotel_H')->where('idSuratTugas_H',$data_surat_tugas_h[0]['id'])->first();
            $pesanan_hotel_h_inserted;
            if($check_hotel_h == null){
                $pesanan_hotel_h                    = new TPesananHotelH();
                $pesanan_hotel_h->idSuratTugas_H    = $data_surat_tugas_h[0]['id'];
                $pesanan_hotel_h->suratPesan_date   = \Carbon\Carbon::parse($request->tanggal_surat_tugas)->format('Y-m-d');
                $pesanan_hotel_h->order_code        = $generate_number; 
                $pesanan_hotel_h->start_date        = $data_surat_tugas_h[0]['start_date'];
                $pesanan_hotel_h->end_date          = $data_surat_tugas_h[0]['end_date'];
                $pesanan_hotel_h->payment_status    = 1;
                $pesanan_hotel_h->idDIPA            = $data_surat_tugas_h[0]['idDipa'];
                $pesanan_hotel_h->IdDepartment      = $data_surat_tugas_h[0]['idDepartment'];
                $pesanan_hotel_h->term              = $request->term;
                $pesanan_hotel_h->created_by        = Auth::user()->id;
                $pesanan_hotel_h->updated_by        = Auth::user()->id;
                $pesanan_hotel_h->create();

                 // get pesanan_hotel_h by order code
                $pesanan_hotel_h_inserted   = DB::table('TPesananHotel_H')->where('idSuratTugas_H',$data_surat_tugas_h[0]['id'])
                                                ->where('order_code',$generate_number)->first();
            } else {
                $pesanan_hotel_h_inserted = $check_hotel_h; 
            }
            
           

            for ( $ii = 0 ; $ii < count( $request->harga ) ; $ii++ )
            {
                if($request->harga[$ii] != null or $request->harga[$ii] != ""){
                    $surat_tugas_d    = (new TPSuratTugasD)->get_surat_tugas_d($request->id_surat_tugas_d[$ii]);
                    $data_employee  = DB::table('MEmployee')->where('id',$surat_tugas_d[0]->idEmployee)->first();

                    $msbu = DB::table('MSBU')->where('idKota',$data_surat_tugas_h[0]['idKota'])->where('idGolongan',$data_employee->idGolongan)->first();
                    $kota_gagal = DB::table('MKota')->where('id',$data_surat_tugas_h[0]['idKota'])->first();
                    $golongan_gagal = DB::table('MGolongan')->where('id',$data_employee->idGolongan)->first();
                    if($msbu == null){
                        Session::flash('gagal',"GAGAL : Data SBU belum ada pada karyawan bernama $data_employee->employee_name. Anda harus menambahkan dulu di fitur SBU, dengan kota dan golongan yang sesuai karyawan tersebut. Silahkan tambahkan Kota : $kota_gagal->city_name dan Golongan : $golongan_gagal->class_name , pada fitur master SBU. agar karyawan tersebut bisa dipesankan hotel");
                        return redirect()->back();
                    }
                    
                    $generate_voucher = (new MSetNumber)->generateNumber("Voucher Hotel");
                    
                    $pesanan_hotel_d                    = new TPesananHotelD();
                    $pesanan_hotel_d->idPesananHotel    = $pesanan_hotel_h_inserted->id;
                    $pesanan_hotel_d->idSuratTugasD     = $surat_tugas_d[0]->id;
                    $pesanan_hotel_d->idKota            = $data_surat_tugas_h[0]['idKota'];
                    $pesanan_hotel_d->idSupplier        = $request->hotel[$ii];
                    $pesanan_hotel_d->payment_status    = 1;
                    $pesanan_hotel_d->checkin_date      = \Carbon\Carbon::parse($request->tanggal_check_in[$ii])->format('Y-m-d');
                    $pesanan_hotel_d->checkout_date     = \Carbon\Carbon::parse($request->tanggal_check_out[$ii])->format('Y-m-d');
                    $pesanan_hotel_d->voucher_number    = $generate_voucher;
                    $pesanan_hotel_d->AR_price          = (double) str_replace('.','',$request->harga[$ii]);
                    $pesanan_hotel_d->AP_price          = $msbu->value;
                    $pesanan_hotel_d->create();

                    DB::table('TSuratTugas_D')
                                    ->where('id', $surat_tugas_d[0]->id)
                                    ->update(['hotel_status' => 0]);
                }

            }
        }

        (new TPesananHotelH)->checkStatus($data_surat_tugas_h[0]['id']);
    
        Session::flash('sukses',"Data Pesan Hotel berhasil diinput.");
        return redirect()->back();
    }


}
