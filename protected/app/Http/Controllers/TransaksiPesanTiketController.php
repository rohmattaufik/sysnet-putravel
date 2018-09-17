<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDipa,
    App\Http\Controllers\MSetNumber\MSetNumberListController as MSetNumber,
    App\Http\Controllers\TPesananTiket\TPesananTiketHListController as TPesananTiketH,
    App\Http\Controllers\TPesananTiket\TPesananTiketDListController as TPesananTiketD,
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

class TransaksiPesanTiketController extends Controller
{
    public function index($id) {

        $data_kota = (new MKota)->get_list();
        $data_dipa = (new MDIPA)->get_list();
        $data_department = (new MDepartment)->get_list();
        $data_surat_tugas_h = (new TPSuratTugasH)->get_all_list();
        $data_surat_tugas_h_one = (new TPSuratTugasH)->get_surat_tugas_h($id);
        $data_employee = (new MEmployee)->get_list();
        $data_supplier = (new MSupplier)->get_list();

//        dd($data_surat_tugas_h_one);

//        foreach ($data_surat_tugas_h as $data) {
//            dd($data[3]);
//            foreach ($data['suratTugasD'] as $data2) {
//                dd($data2->employee_name);
//            }
//        }

//        for ($i = 0; $i<count($data_surat_tugas_h);$i++) {
//            dd($data_surat_tugas_h);
//            foreach ($data_surat_tugas_h[$i]['suratTugasD'] as $data2) {
//                dd($data2->employee_name);
//            }
//        }


        return view('modul_transaksi/pesan_tiket/pesan_tiket')
            ->with('data_kota',$data_kota)
            ->with('data_dipa',$data_dipa)
            ->with('data_employee',$data_employee)
            ->with('data_department',$data_department)
            ->with('data_surat_tugas_h',$data_surat_tugas_h)
            ->with('data_surat',$data_surat_tugas_h_one)
            ->with('id_surat_h',$id)
            ->with('data_supplier',$data_supplier)
            ;
    }

    public function store(Request $request) {

        $new_pesan_tiket_h = new TPesananTiketH();
//        dd((new TPSuratTugasH)->get_surat_tugas_h($request->id_surat_h));
        $new_pesan_tiket_h->order_code = (new MSetNumber)->generateNumber("Pesan Tiket");
        $new_pesan_tiket_h->idSuratTugas_H = $request->id_surat_h;
        $new_pesan_tiket_h->transaction_date = $request->tanggal_surat;
        $new_pesan_tiket_h->idKota = $request->idKota;
        $new_pesan_tiket_h->order_ticket_status = 1;
        $new_pesan_tiket_h->IdDepartment = $request->idDept;
        $new_pesan_tiket_h->idDIPA = $request->idDipa;
        $new_pesan_tiket_h->created_by = Auth::user()->id;
        $new_pesan_tiket_h->created_at = Carbon::now();
        $new_pesan_tiket_h->term = $request->term;

        $new_pesan_tiket_h->create();
        $data_tiket_h_last = (new TPesananTiketH())->get_last();

        for($i=0; $i<count($request->file('file_tiket')); $i++) {
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
                $new_pesan_tiket_d->AP_ticket_price = str_replace('.','',$request->harga_maskapai[$i]);
                $new_pesan_tiket_d->AR_ticket_price = str_replace('.','',$request->harga_tiket[$i]);
//                $new_pesan_tiket_d->margin = 1;
                $new_pesan_tiket_d->sts = 1;
                $new_pesan_tiket_d->idPesanTiket_H = $data_tiket_h_last[0]->id;

                if(!is_null($request->file('file_tiket')[$i])) {
                    $destinationPath = "Uploads/{$request->book_number[$i]}";
                    $movea = $request->file('file_tiket')[$i]->move($destinationPath,$request->file('file_tiket')[$i]->getClientOriginalName());
                    $url_file = "Uploads/{$request->book_number[$i]}/{$request->file('file_tiket')[$i]->getClientOriginalName()}";
                    $new_pesan_tiket_d->file_tiket= $url_file;
                } else {

                    Session::flash('gagal', 'Tiket harap di upload');
                    return redirect()->back();
                }

                $new_pesan_tiket_d->create();


                //update surat tugas d
                $new_surat_tugas_d = new TPSuratTugasD();
                $new_surat_tugas_d->id = $request->idSuratTugas_D[$i];
                $new_surat_tugas_d->plane_status = 0;
                $new_surat_tugas_d->update_plane_sts();

            }
        }
        //update surat h
        $new_surat_tugas_h = new TPSuratTugasH();
        // $new_surat_tugas_h->id = $request->id_surat_h;
        // $new_surat_tugas_h->plane_status = 0;
        // $new_surat_tugas_h->updated_by = Auth::user()->id;
        // $new_surat_tugas_h->update_plane_sts();
        $new_pesan_tiket_h->checkStatus($request->id_surat_h);
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

            Session::flash('sukses', 'Data Surat Tugas sukses di-update');
            return redirect(url(action('TransaksiSuratTugasController@index')));
        }
    }

}
