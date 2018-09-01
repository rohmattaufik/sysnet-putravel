<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDipa,
    App\Http\Controllers\TPesananTiket\TPesananTiketHListController as TPesananTiketH,
    App\Http\Controllers\TPesananTiket\TPesananTiketDListController as TPesananTiketD,
    App\Http\Controllers\MSupplier\MSupplierListController as MSupplier,
    App\Http\Controllers\TSuratTugas\TSuratTugasDListController as TPSuratTugasD,
    App\Http\Controllers\TSuratTugas\TSuratTugasHListController as TPSuratTugasH,
    App\Http\Controllers\THutangPiutang\TPiutangListController as TPiutang,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MEmployee\MEmployeeListController as MEmployee,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class KonfirmasiTiketController extends Controller
{
    public function index() {

        $data_kota = (new MKota)->get_list();
        $data_dipa = (new MDIPA)->get_list();
        $data_department = (new MDepartment)->get_list();
        $data_surat_tugas_h = (new TPSuratTugasH)->get_all_list();
        $data_tiket_surat = (new TPesananTiketH)->get_all_list_pembuat_surat();
        $data_tiket_travel = (new TPesananTiketH)->get_all_list_travel();
//        $data_surat_tugas_h_one = (new TPSuratTugasH)->get_surat_tugas_h($id);
        $data_employee = (new MEmployee)->get_list();
        $data_supplier = (new MSupplier)->get_list();

        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            $data_tiket_user = (new TPesananTiketD)->get_by_id_emp(Auth::user()->id);
        } else {
            $data_tiket_user = (new TPesananTiketD)->get_by_id_emp(1);
        }

        $index_travel = 1;
        $index_user = 1;
        $index_pembuat_surat = 1;


//        dd($data_tiket_surat);

        return view('modul_konfirmasi/konfirmasi_tiket')
            ->with('data_kota',$data_kota)
            ->with('data_dipa',$data_dipa)
            ->with('data_employee',$data_employee)
            ->with('data_department',$data_department)
            ->with('data_tiket_travel', $data_tiket_travel)
            ->with('data_tiket_surat',$data_tiket_surat)
            ->with('data_surat_tugas_h',$data_surat_tugas_h)
            ->with('data_tiket_user', $data_tiket_user)
            ->with('data_supplier',$data_supplier)
            ->with('index_travel', $index_travel)
            ->with('index_user', $index_user)
            ->with('index_pembuat_surat', $index_pembuat_surat)
            ;
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

        if($request->jenis == "konfirmasi_user") {
            (new TPesananTiketD)->update_status($request->id_tiket_d, '2');
        } elseif ($request->jenis == "konfirmasi_pembuat_surat") {
            (new TPesananTiketH)->update_status_pembuat_surat($request->id_tiket_h, '3');
        } elseif ($request->jenis == "konfirmasi_travel") {
            (new TPesananTiketH)->update_status_travel($request->id_tiket_h, '4');
            (new TPiutang)->create($request->id_tiket_h);
        }



        Session::flash('sukses', 'Data Tiket Anda berhasil di-approve');
        return redirect(url(action('KonfirmasiTiketController@index')));

    }

}
