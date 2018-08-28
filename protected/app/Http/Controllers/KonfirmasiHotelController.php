<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDipa,
    App\Http\Controllers\TPesananHotel\TPesananHoteltHListController as TPesananHotelH,
    App\Http\Controllers\TPesananHotel\TPesanHotelDListController as TPesananHotelD,
    App\Http\Controllers\MSupplier\MSupplierListController as MSupplier,
    App\Http\Controllers\TSuratTugas\TSuratTugasDListController as TPSuratTugasD,
    App\Http\Controllers\TSuratTugas\TSuratTugasHListController as TPSuratTugasH,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MEmployee\MEmployeeListController as MEmployee,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class KonfirmasiHotelController extends Controller
{
    public function index() {

        $data_pesan_hotel_d;
        if( Auth::user()->role == 1  )
        {
            $data_pesan_hotel_d = (new TPesananHotelD)->get_by_payment( 1 );
        }
        if ( Auth::user()->role == 2)
        {
            $data_pesan_hotel_d_paymet_1 = (new TPesananHotelD)->get_by_payment( 1 );
            
            $data_pesan_hotel_d_paymet_2 = (new TPesananHotelD)->get_by_payment( 2 );   
            $data_pesan_hotel_d = array_merge( $data_pesan_hotel_d_paymet_1, $data_pesan_hotel_d_paymet_2);
        }
        
        if ( Auth::user()->role == 3)
        {
            $data_pesan_hotel_d = (new TPesananHotelD)->get_by_payment( 3 );
        }
        // dd($data_pesan_hotel_d);
        $data_surat_tugas_h = array();
        foreach ( $data_pesan_hotel_d as $data_d)
        {
            $in = false;
            for( $ii = 0; $ii < count($data_surat_tugas_h); $ii++ ){
                //dd($data_d->id_surat_tugas_h);
                if($data_surat_tugas_h[$ii]['id'] == $data_d->id_surat_tugas_h)
                {
                    $in = true;
                    //dd(count($surat_tugas_h['data_pesan_hotel']));
                    $data_surat_tugas_h[$ii]['data_pesan_hotel'][count($data_surat_tugas_h[$ii]['data_pesan_hotel'])] = $data_d;
                    // dd($surat_tugas_h);
                }
            }
            if( $in == false)
            {
                $item_h = (new TPSuratTugasH)->get_surat_tugas_h($data_d->id_surat_tugas_h);
                $item_h[0]['data_pesan_hotel'][0] = $data_d;
                array_push($data_surat_tugas_h , $item_h[0]);
            }
        }
         // dd($data_surat_tugas_h);
        return view('modul_konfirmasi.konfirmasi_hotel')
                        ->with('data', $data_surat_tugas_h);
        

    }

    public function store( Request $request)
    {
        if ( Auth::user()->role == 1)
        {
            for ( $ii = 0; $ii < count($request->id_pesan_hotel_d); $ii++ )
            {
                $pesan_hotel_d = new TPesananHotelD( $request->id_pesan_hotel_d[$ii] );
                if( Auth::user()->id == $request->id_employee[$ii])
                {
                    $pesan_hotel_d->payment_status = 3;
                } else {
                    $pesan_hotel_d->payment_status = 2;
                }
                $pesan_hotel_d->update();
            }
        }

        if ( Auth::user()->role == 2)
        {
            foreach ( $request->id_pesan_hotel_d as $id_pesan_hotel_d)
            {
                $pesan_hotel_d = new TPesananHotelD( $id_pesan_hotel_d);
                $pesan_hotel_d->payment_status = 3;
                $pesan_hotel_d->update();
            }
        }

        if ( Auth::user()->role == 3)
        {
            foreach ( $request->id_pesan_hotel_d as $id_pesan_hotel_d)
            {
                $pesan_hotel_d = new TPesananHotelD( $id_pesan_hotel_d);
                $pesan_hotel_d->payment_status = 4;
                $pesan_hotel_d->update();
            }
        }

        return redirect('konfirmasi/hotel');
    }
    

}
