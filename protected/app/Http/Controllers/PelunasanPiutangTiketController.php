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
use function Sodium\increment;

class PelunasanPiutangTiketController extends Controller
{
    public function index() {

        $data_tiket_surat = (new TPesananTiketH)->get_all_list_piutang();

//        $data_surat_tugas_h_one = (new TPSuratTugasH)->get_surat_tugas_h($id);



//        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
//            $data_tiket_user = (new TPesananTiketD)->get_by_id_emp(Auth::user()->id);
//        } else {
//            $data_tiket_user = (new TPesananTiketD)->get_by_id_emp(1);
//        }



//        dd($data_tiket_surat);

        return view('modul_pelunasan_piutang/pelunasan_piutang_tiket')
            ->with('data_tiket_surat',$data_tiket_surat)
            ;
    }

    public function pilihjenis(Request $request) {
        if($request->jenis == 'tiket') {
            return redirect(url(action('KonfirmasiPembayaranTiketController@index')));
        } else {
            return redirect(url(action('KonfirmasiHotelController@index')));
        }
    }

    public function store(Request $request) {
//        dd($request);



        $tiket_d = new TPesananTiketD();
        for($i=0;$i<count($request->id_tiket_d);$i++) {
//            dd($tiket_d->get_pesanan_tiket_d($request->id_tiket_d[$i])[0]->AP_ticket_price);
            for($j=0;$j<count($request->nilai_bayar);$j++) {

                $new_piutang_tiket = DB::table('TPiutang')
                    ->where('idPesanTiketH',$request->id_tiket_h)
                    ->where('noPesanD',$request->id_tiket_d[$j])
                    ->first();
//                dd($new_piutang_tiket);

                $new_nilai_saldo = $new_piutang_tiket->nilaiSaldo - $new_piutang_tiket->nilai;
//                dd($new_nilai_saldo);
                if($new_nilai_saldo == 0) {
                    DB::table('TPiutang')
                        ->where('idPesanTiketH',$request->id_tiket_h)
                        ->where('noPesanD',$request->id_tiket_d[$j])
                        ->update(['sts' => '0']);
                }

                if($tiket_d->get_pesanan_tiket_d($request->id_tiket_d[$j])[0]->AP_ticket_price == $request->nilai_bayar[$j]) {
                    DB::table('TBayar')->insert([
                        'payment_code' => 123,
                        'payment_date' => $request->tanggal_bayar,
                        'jenis' => 'p',
                        'idBanks' => 1,
                        'idPesanTiketD' => $request->id_tiket_d[$j],
                        'nilai' => $request->nilai_bayar[$j]
                    ]);
                }
            }
        }


        Session::flash('sukses',"Pelunasan Piutang berhasil diproses.");
        return redirect()->action('PelunasanPiutangTiketController@index');
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

        for($i=0;$i<count($request->id_tiket_d);$i++) {
            (new TPesananTiketD)->update_status($request->id_tiket_d[$i], '5');
        }


        Session::flash('sukses', 'Data Tiket Anda berhasil di-update');
        return redirect(url(action('KonfirmasiPembayaranTiketController@index')));

    }

}
