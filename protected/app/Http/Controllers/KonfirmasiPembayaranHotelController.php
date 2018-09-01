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

class KonfirmasiPembayaranHotelController extends Controller
{
    public function index() {

        $data_pesan_hotel_d = (new TPesananHotelD)->get_by_payment( 4 );
        $data_surat_tugas_h = array();
        foreach ( $data_pesan_hotel_d as $data_d)
        {
            $in = false;
            for( $ii = 0; $ii < count($data_surat_tugas_h); $ii++ ){
                if($data_surat_tugas_h[$ii]['id'] == $data_d->id_surat_tugas_h)
                {
                    $in = true;
                    $data_surat_tugas_h[$ii]['data_pesan_hotel'][count($data_surat_tugas_h[$ii]['data_pesan_hotel'])] = $data_d;
                }
            }
            if( $in == false)
            {
                $item_h = (new TPSuratTugasH)->get_surat_tugas_h($data_d->id_surat_tugas_h);
                $item_h[0]['data_pesan_hotel'][0] = $data_d;
                array_push($data_surat_tugas_h , $item_h[0]);
            }
        }

        for ($jj = 0; $jj < count($data_surat_tugas_h); $jj++){
            $total_payment = 0;
            foreach( $data_surat_tugas_h[$jj]['data_pesan_hotel'] as $data_pesan_hotel)
            {
                $total_payment += $data_pesan_hotel->AR_price;
            }
            $data_surat_tugas_h[$jj]['total_payment'] = $total_payment;
        }
       
        return view('modul_konfirmasi_pembayaran/konfirmasi_pembayaran_hotel')
            ->with('data',$data_surat_tugas_h)
            ;
    }

    public function pilihjenis(Request $request) {
        if($request->jenis == 'tiket') {
            return redirect(url(action('KonfirmasiPembayaranTiketController@index')));
        } else {
            return redirect(url(action('KonfirmasiPembayaranHotelController@index')));
        }
    }

    public function store(Request $request) {


        $new_pesan_tiket_h = new TPesananTiketH();
//        dd((new TPSuratTugasH)->get_surat_tugas_h($request->id_surat_h));
        $new_pesan_tiket_h->order_code = 1;
        $new_pesan_tiket_h->idSuratTugas_H = 1;
        $new_pesan_tiket_h->transaction_date = $request->tanggal_surat;
        $new_pesan_tiket_h->idKota = $request->idKota;
        $new_pesan_tiket_h->order_ticket_status = 1;
        $new_pesan_tiket_h->IdDepartment = $request->idDept;
        $new_pesan_tiket_h->idDIPA = $request->idDipa;
        $new_pesan_tiket_h->created_by = Auth::user()->id;
        $new_pesan_tiket_h->created_at = Carbon::now();

        //update surat h
        $new_surat_tugas_h = new TPSuratTugasH();
        $new_surat_tugas_h->id = $request->id_surat_h;
        $new_surat_tugas_h->plane_status = 0;
        $new_surat_tugas_h->updated_by = Auth::user()->id;
        $new_surat_tugas_h->update_plane_sts();

        $new_pesan_tiket_h->create();

        $data_tiket_h_last = (new TPesananTiketH())->get_last();


        for($i=0; $i<count($request->book_number); $i++) {
            if(!is_null($request->book_number[$i])) {
                $new_pesan_tiket_d = new TPesananTiketD();
                $new_pesan_tiket_d->idSuratTugas_D = $request->idSuratTugas_D[$i];
                $new_pesan_tiket_d->idKota = $request->idKota;
                $new_pesan_tiket_d->idSupplier = $request->maskapai[$i];
                $new_pesan_tiket_d->booking_code = $request->book_number[$i];
                $new_pesan_tiket_d->departure_date = $request->tanggal_berangkat[$i];
                $new_pesan_tiket_d->arrival_date = $request->tanggal_kembali[$i];
                $new_pesan_tiket_d->reserve_berangkat = $request->reservasi_berangkat[$i];
                $new_pesan_tiket_d->reserve_kembali = $request->reservasi_kembali[$i];
                $new_pesan_tiket_d->AP_ticket_price = $request->harga_maskapai[$i];
                $new_pesan_tiket_d->AR_ticket_price = $request->harga_tiket[$i];
//                $new_pesan_tiket_d->margin = 1;
                $new_pesan_tiket_d->sts = 1;
                $new_pesan_tiket_d->idPesanTiket_H = 1;
                $new_pesan_tiket_d->create();


                //update surat tugas d
                $new_surat_tugas_d = new TPSuratTugasD();
                $new_surat_tugas_d->id = $request->idSuratTugas_D[$i];
                $new_surat_tugas_d->plane_status = 0;
                $new_surat_tugas_d->update_plane_sts();

            }
        }

//        dd($request);

        Session::flash('sukses',"Pesanan Tiket berhasil diinput.");
        return redirect()->action('TransaksiPesananController@index');
    }

    public function delete(Request $request)
    {

        $TSuratH = new TPSuratTugasH($request->surat_id);
        $TSuratD = (new TPSuratTugasD)->get_surat_tugas_d_id_h($TSuratH->id);

        $count = 0;

        foreach ($TSuratD as $data) {
            (new TPSuratTugasD)->deleteByIdH($data->id, $data->idSuratTugas_H);
            $count++;
        }
        $TSuratH->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data Surat Tugas');
        return redirect()->back();

    }

    public function edit($id)
    {
        $data_kota = (new MKota)->get_list();
        $data_dipa = (new MDIPA)->get_list();
        $data_department = (new MDepartment)->get_list();
        $data_surat_tugas_h = (new TPSuratTugasH)->get_surat_tugas_h($id);
        $data_employee = (new MEmployee)->get_list();

//        dd($data_surat_tugas_h[0]['suratTugasD'][0]);
        return view('modul_transaksi/surat_tugas/edit_surat_tugas')
            ->with('data_kota', $data_kota)
            ->with('data_dipa',$data_dipa)
            ->with('data_department', $data_department)
            ->with('data_employee',$data_employee)
            ->with('data_surat',$data_surat_tugas_h)
            ;

    }

    public function update(Request $request)
    {
//        dd($request);
        $id_user = Auth::user()->id;

        foreach ( $request->id_hotel_d as $id_hotel_d)
            {
            $pesan_hotel_d = new TPesananHotelD( $id_hotel_d);
            $pesan_hotel_d->payment_status = 5;
            $pesan_hotel_d->update();
        }


        Session::flash('sukses', 'Data Hotel Anda berhasil di-update');
        return redirect(url(action('KonfirmasiPembayaranHotelController@index')));

    }

}
