<?php

namespace App\Http\Controllers\THutangPiutang;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class TPiutangListController extends Controller{

    public $id;
    public $idPesanTiketH;
    public $transaction_code;
    public $tglPiutang;
    public $idJenisSupplier;
    public $noPesanD;
    public $idSuratTugas;
    public $nilai;
    public $nilaiSaldo;
    public $sts;
    public $exist;

    public function __construct($id = false){
        if($id){
            $TPiutang = DB::table("TPiutang")
                ->where('id',$id)
                ->first();
                if($TPiutang){
                    $this->id                   = $TPiutang->id;
                    $this->idPesanTiketH        = $TPiutang->idPesanTiketH;
                    $this->transaction_code     = $TPiutang->transaction_code;
                    $this->tglPiutang           = $TPiutang->tglPiutang;
                    $this->idJenisSupplier      = $TPiutang->idJenisSupplier;
                    $this->noPesand             = $TPiutang->noPesand;
                    $this->idSuratTugas         = $TPiutang->idSuratTugas;
                    $this->nilai                = $TPiutang->nilai;
                    $this->nilaiSaldo           = $TPiutang->nilaiSaldo;
                    $this->sts                  = $TPiutang->sts;
                    $this->exist                = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function create($idH){
          $data_tiket_H = DB::select(DB::raw("CALL TPesanTiket_D_View_idH($idH)"));
          $count = 0;
          foreach($data_tiket_H as $row) {
              DB::unprepared(DB::raw("CALL TPiutang_Tiket_Create($row->id)"));
          }
          return $count;
      }

      public function createHotel($idH){
            $data_tiket_H = DB::select(DB::raw("CALL TPesanHotel_D_View_idH($idH)"));
            $count = 0;
            foreach($data_tiket_H as $row) {
                DB::unprepared(DB::raw("CALL TPiutang_Hotel_Create($row->id)"));
            }
            return $count;
        }

}
