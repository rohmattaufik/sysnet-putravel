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

class TransaksiPesanHotelController extends Controller
{
    public function index( $id_surat_tugas ) {

        // $data_kota = (new MKota)->get_list();
        // $data_dipa = (new MDIPA)->get_list();
        // $data_department = (new MDepartment)->get_list();
        $data_surat_tugas_h = (new TPSuratTugasH)->get_surat_tugas_H( $id_surat_tugas );

        $data_kota = (new MSupplier)->get_hotel_by_town($data_surat_tugas_h[0]['idKota']);
        // $data_employee = (new MEmployee)->get_list();
        // dd($data_surat_tugas_h);
        // dd($data_surat_tugas_h[0]);
       return view('modul_transaksi/surat_tugas/pesan_hotel/pesan_hotel')
           ->with('data_kota',$data_kota)
           ->with('data_surat_tugas',$data_surat_tugas_h);
    }


    public function store(Request $request) {

        if (!is_null($request)) {
            $data_surat_tugas_h = (new TPSuratTugasH)->get_surat_tugas_H( $request->id_surat_tugas );
            //dd($data_surat_tugas_h);
            // get set number
            // $set_num_tPesanHotelh = DB::table('MSetNumber')->where('transaction_type','Pesan Hotel H')->first();

            // @DB::table('MSetNumber')
            //                     ->where('id', $set_num_tPesanHotelh->id)
            //                     ->update(['set_number_code' => $set_num_tPesanHotelh->set_number_code + 1]);
            // update set number
            $generate_number = (new MSetNumber)->generateNumber("Pesan Hotel");

            $check_hotel_h   = DB::table('TPesananHotel_H')->where('idSuratTugas_H',$data_surat_tugas_h[0]['id'])->first();
            $pesanan_hotel_h_inserted;
            if($check_hotel_h == null){
                $pesanan_hotel_h                    = new TPesananHotelH();
                $pesanan_hotel_h->idSuratTugas_H    = $data_surat_tugas_h[0]['id'];
                $pesanan_hotel_h->suratPesan_date   = $request->tanggal_surat_tugas;
                $pesanan_hotel_h->order_code        = $generate_number; 
                $pesanan_hotel_h->start_date        = $data_surat_tugas_h[0]['start_date'];
                $pesanan_hotel_h->end_date          = $data_surat_tugas_h[0]['end_date'];
                $pesanan_hotel_h->payment_status    = 1;
                $pesanan_hotel_h->idDIPA            = $data_surat_tugas_h[0]['idDipa'];
                $pesanan_hotel_h->IdDepartment      = $data_surat_tugas_h[0]['idDepartment'];
                $pesanan_hotel_h->created_by        = Auth::user()->id;
                $pesanan_hotel_h->updated_by        = Auth::user()->id;
                $pesanan_hotel_h->create();

                 // get pesanan_hotel_h by order code
                 $pesanan_hotel_h_inserted   = DB::table('TPesananHotel_H')->where('idSuratTugas_H',$data_surat_tugas_h[0]['id'])
                                                ->where('order_code',$generate_number)->first();
                                                //->where('order_code', 1)->first();

            } else {
                $pesanan_hotel_h_inserted = $check_hotel_h; 
            }
            
           

            for ( $ii = 0 ; $ii < count( $request->harga ) ; $ii++ )
            {
                if($request->harga[$ii] != null or $request->harga[$ii] != ""){
                    //dd($request->id_surat_tugas_d[$ii]);
                    $surat_tugas_d    = (new TPSuratTugasD)->get_surat_tugas_d($request->id_surat_tugas_d[$ii]);
                    // $surat_tugas_d   = DB::table('TSuratTugas_D')->where('id',$request->id_surat_tugas_d[$ii])->get();
                    // dd($surat_tugas_d);
                    $data_employee  = DB::table('MEmployee')->where('id',$surat_tugas_d[0]->idEmployee)->first();

                    $msbu = DB::table('MSBU')->where('idKota',$data_surat_tugas_h[0]['idKota'])->where('idGolongan',$data_employee->idGolongan)->first();
                    if($msbu == null){
                        Session::flash('gagal',"GAGAL : Data SBU belum ada");
                        return redirect()->back();
                    }
                    // dd($data_employee->idGolongan);
                    // dd($msbu);
                    // get set number

                    $generate_voucher = (new MSetNumber)->generateNumber("Voucher Hotel");
                    //$set_num_tPesanHoteld = DB::table('MSetNumber')->where('transaction_type','Pesan Hotel D')->first();

                    // update set number
                    // @DB::table('MSetNumber')
                    //                 ->where('id', $set_num_tPesanHoteld->id)
                    //                 ->update(['set_number_code' => $set_num_tPesanHoteld->set_number_code + 1]);
                    // dd($request->harga[$ii]);

                    $pesanan_hotel_d                    = new TPesananHotelD();
                    $pesanan_hotel_d->idPesananHotel    = $pesanan_hotel_h_inserted->id;
                    $pesanan_hotel_d->idSuratTugasD     = $surat_tugas_d[0]->id;
                    $pesanan_hotel_d->idKota            = $data_surat_tugas_h[0]['idKota'];
                    $pesanan_hotel_d->idSupplier        = $request->hotel[$ii];
                    $pesanan_hotel_d->term              = $request->term[$ii];
                    $pesanan_hotel_d->payment_status    = 1;
                    $pesanan_hotel_d->checkin_date      = $request->tanggal_check_in[$ii];
                    $pesanan_hotel_d->checkout_date     = $request->tanggal_check_out[$ii];
                    $pesanan_hotel_d->voucher_number    = $generate_voucher;
                    $pesanan_hotel_d->AR_price          = (double) $request->harga[$ii];
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
