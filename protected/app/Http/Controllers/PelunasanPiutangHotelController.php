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
use function Sodium\increment;

class PelunasanPiutangHotelController extends Controller
{
    public function index() {

        $data_pesan_hotel_d = (new TPesananHotelD)->get_by_payment( 5 );
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
    //    dd($data_surat_tugas_h);
        return view('modul_pelunasan_piutang/pelunasan_piutang_hotel')
            ->with('data',$data_surat_tugas_h)
            ;
    }

    public function pilihjenis(Request $request) {
        if($request->jenis == 'tiket') {
            return redirect(url(action('KonfirmasiPembayaranTiketController@index')));
        } else {
            return redirect(url(action('KonfirmasiHotelController@index')));
        }
    }

    public function store(Request $request)
    {

        if (count($request->nilai_bayar) != count($request->id_tiket_d)) {
            Session::flash('gagal', 'Isi Harga Bayar dan Checklist harus di isi bersamaan atau tidak sama sekali');

            return redirect()->back();
        }


        for ($j = 0; $j < count($request->id_tiket_d); $j++) {

            if(is_null($request->nilai_bayar[$request->id_tiket_d[$j]])) {
                Session::flash('gagal', 'Isi Harga Bayar dan Checklist harus di isi bersamaan atau tidak sama sekali');

                return redirect()->back();
            }

            $new_piutang_tiket = DB::table('TPiutang')
                ->where('idPesanTiketH', $request->id_tiket_h)
                ->where('noPesanD', $request->id_tiket_d[$j])
                ->first();

            $new_nilai_saldo = $new_piutang_tiket->nilaiSaldo - str_replace('.','',$request->nilai_bayar[$request->id_tiket_d[$j]]);

            if ($new_nilai_saldo == 0) {
                DB::table('TPiutang')
                    ->where('idPesanTiketH', $request->id_tiket_h)
                    ->where('noPesanD', $request->id_tiket_d[$j])
                    ->update(['nilaiSaldo' => 0, 'sts' => '0']);

                DB::table('TPesanTiket_D')
                    ->where('id', $request->id_tiket_d[$j])
                    ->update(['sts' => '0']);

            } else {
                DB::table('TPiutang')
                    ->where('idPesanTiketH', $request->id_tiket_h)
                    ->where('noPesanD', $request->id_tiket_d[$j])
                    ->update(['nilaiSaldo' => $new_nilai_saldo]);
            }

            DB::table('TBayar')->insert([
                'payment_code' => (new MSetNumber)->generateNumber("Pesan Tiket"),
                'payment_date' => $request->tanggal_bayar,
                'jenis' => 'p',
                'idBanks' => $request->idBank,
                'idPesanTiketD' => $request->id_tiket_d[$j],
                'nilai' => $request->nilai_bayar[$request->id_tiket_d[$j]]
            ]);

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
