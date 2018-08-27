<?php

namespace App\Http\Controllers\THutangPiutang;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class HutangListController extends Controller{

    public $id;
    public $idPesanTiket_H;
    public $transaction_code;
    public $idSupplier;
    public $tglHutang;
    public $idJenisSupplier;
    public $nilai;
    public $nilaiSaldo;
    public $tglJatuhTempo;
    public $sts;
    public $exist;

    public function __construct($id = false){
        if($id){
            $THutang = DB::table("THutang")
                ->where('id',$id)
                ->first();
                if($THutang){
                    $this->id                   = $THutang->id;
                    $this->idPesanTiket_H       = $THutang->idPesanTiket_H;
                    $this->transaction_code     = $THutang->transaction_code;
                    $this->idSupplier           = $THutang->idSupplier;
                    $this->tglHutang            = $THutang->tglHutang;
                    $this->idJenisSupplier      = $THutang->idJenisSupplier;
                    $this->nilai                = $THutang->nilai;
                    $this->nilaiSaldo           = $THutang->nilaiSaldo;
                    $this->tglJatuhTempo        = $THutang->tglJatuhTempo;
                    $this->sts                  = $THutang->sts;
                    $this->exist                = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

}
