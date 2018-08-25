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
       return view('modul_transaksi/surat_tugas/pesan_hotel')
           ->with('data_kota',$data_kota)
           ->with('data_surat_tugas',$data_surat_tugas_h);
    }

    
    public function store(Request $request) {

        if (!is_null($request)) {
            $data_surat_tugas_h = (new TPSuratTugasH)->get_surat_tugas_H( $request->id_surat_tugas );
            //dd($data_surat_tugas_h);
            // get set number
            $set_num_tPesanHotelh = DB::table('MSetNumber')->where('transaction_type','Pesan Hotel H')->first();
            // update set number

            $pesanan_hotel_h                    = new TPesananHotelH();
            $pesanan_hotel_h->idSuratTugas_H    = $data_surat_tugas_h[0]['id'];
            $pesanan_hotel_h->suratPesan_date   = $data_surat_tugas_h[0]['created_at'];
            $pesanan_hotel_h->order_code        = $set_num_tPesanHotelh->set_number_code + 1;
            $pesanan_hotel_h->start_date        = $data_surat_tugas_h[0]['start_date'];
            $pesanan_hotel_h->end_date          = $data_surat_tugas_h[0]['end_date'];
            // if ( count( $request->harga) < count( $data_surat_tugas_h['suratTugasD'] ) ){
            //     $pesanan_hotel_h->payment_status    = 0;
            // } else {
                $pesanan_hotel_h->payment_status    = 1;
            // }
            $pesanan_hotel_h->idDIPA            = $data_surat_tugas_h[0]['idDipa'];
            $pesanan_hotel_h->IdDepartment      = $data_surat_tugas_h[0]['idDepartment'];
            $pesanan_hotel_h->created_by        = Auth::user()->id;
            $pesanan_hotel_h->updated_by        = Auth::user()->id;
            $pesanan_hotel_h->create();


            // get pesanan_hotel_h by order code
                $pesanan_hotel_h_inserted   = DB::table('TPesananHotel_H')->where('idSuratTugas_H',$data_surat_tugas_h[0]['id'])
                                                ->where('order_code',$set_num_tPesanHotelh->set_number_code + 1)->first();

                for ( $ii = 0 ; $ii < count( $request->harga ) ; $ii++ )
                {
                    if($request->harga[$ii] != null or $request->harga[$ii] != ""){
                        //dd($request->id_surat_tugas_d[$ii]);
                        $surat_tugas_d    = (new TPSuratTugasD)->get_surat_tugas_d($request->id_surat_tugas_d[$ii]);
                        // $surat_tugas_d   = DB::table('TSuratTugas_D')->where('id',$request->id_surat_tugas_d[$ii])->get();
                        // dd($surat_tugas_d);
                        $data_employee  = DB::table('MEmployee')->where('id',$surat_tugas_d[0]->idEmployee)->first();
                        
                        $msbu = DB::table('MSBU')->where('idKota',$data_surat_tugas_h[0]['idKota'])->where('idGolongan',$data_employee->idGolongan)->first();
                        // dd($data_employee->idGolongan);
                        // dd($msbu);
                        // get set number
                        $set_num_tPesanHoteld = DB::table('MSetNumber')->where('transaction_type','Pesan Hotel D')->first();

                        // update set number
                        // dd($request->harga[$ii]);

                        $pesanan_hotel_d                    = new TPesananHotelD();
                        $pesanan_hotel_d->idPesananHotel    = $surat_tugas_d[0]->id;
                        $pesanan_hotel_d->idSuratTugasD     = $surat_tugas_d[0]->id;
                        $pesanan_hotel_d->idKota            = $data_surat_tugas_h[0]['idKota'];
                        $pesanan_hotel_d->idSupplier        = $request->hotel[$ii];
                        $pesanan_hotel_d->payment_status    = 1;
                        $pesanan_hotel_d->checkin_date      = $request->tanggal_check_in[$ii];
                        $pesanan_hotel_d->checkout_date     = $request->tanggal_check_out[$ii];
                        $pesanan_hotel_d->voucher_number    = $set_num_tPesanHoteld + 1; 
                        $pesanan_hotel_d->AR_price          = (double) $request->harga[$ii];
                        $pesanan_hotel_d->AP_price          = $msbu->value;
                        $pesanan_hotel_d->create();
                        
                        DB::table('TSuratTugas_D')
                                        ->where('id', $surat_tugas_d[0]->id)
                                        ->update(['hotel_status' => 0]);
                    }   
                    
                }
            }

        Session::flash('sukses',"Data Surat Tugas berhasil diinput.");
        return redirect()->back();
    }

    public function delete(Request $request)
    {

        $TSuratH = new TPSuratTugasH($request->surat_id);
        $TSuratD = (new TPSuratTugasD)->get_surat_tugas_d_id_h($TSuratH->id);
        dd($TSuratD);
        $TSuratH->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data Supplier');
        return redirect()->back();

    }

    public function edit($id)
    {
        $MSupplier = (new MSupplier($id))->get_supplier()[0];
        $data_kota = (new MKota)->get_list();
        $data_jenis_supplier = (new MJenisSupplier)->get_list();
//        dd($MSupplier);
        return view('modul_master/master_supplier/edit')
            ->with('data_supplier', $MSupplier)
            ->with('data_jenis_supplier', $data_jenis_supplier)
            ->with('data_kota',$data_kota)
            ;

    }

    public function update(Request $request)
    {
        $id_user = Auth::user()->id;

        if ($id_user) {
            $new_supplier                = new MSupplier($request->supplier_id);
            $new_supplier->supplier_name = $request->nama_supplier;
            $new_supplier->idJenisSupplier = $request->jenis_supplier;
            $new_supplier->supplier_address = $request->alamat;
            $new_supplier->idKota = $request->kota;
            $new_supplier->email = $request->email;
            $new_supplier->contact_number = $request->no_telp;
            $new_supplier->website = $request->website;
            $new_supplier->contact_person = $request->name_cp;
            $new_supplier->contact_person_number = $request->no_telp_cp;
            $new_supplier->contact_person_address = $request->alamat_cp;
            $new_supplier->updated_by = Auth::user()->id;

            $new_supplier->update();

            Session::flash('sukses', 'Data supplier sukses di-update');
            return redirect(url(action('MasterSupplierController@index')));
        }
    }

}
