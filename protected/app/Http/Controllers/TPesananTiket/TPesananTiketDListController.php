<?php

namespace App\Http\Controllers\TPesananTiket;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;
  
class TPesananTiketDListController extends Controller{

    public $id;
    public $idSuratTugas_D;
    public $AR_ticket_price;
    public $AP_ticket_price;
    public $idKota;
    public $idSupplier;
    public $booking_code;
    public $departure_date;
    public $created_at;
    public $updated_at;
    public $arrival_date;
    public $reserve_berangkat;
    public $reserve_kembali;
    public $margin;
    public $flag_active;
    public $exist;
    public $sts;
    public $idPesanTiket_H;

    public function __construct($id = false){
        if($id){
            $TPesananTiket_D = DB::table("TPesanTiket_D")
                ->where('id',$id)
                ->first();
                if($TPesananTiket_D){
                    $this->id                   = $TPesananTiket_D->id;
                    $this->idSuratTugas_D       = $TPesananTiket_D->idSuratTugas_D;
                    $this->AR_ticket_price      = $TPesananTiket_D->AR_ticket_price;
                    $this->AP_ticket_price      = $TPesananTiket_D->AP_ticket_price;
                    $this->idKota               = $TPesananTiket_D->idKota;
                    $this->idSupplier           = $TPesananTiket_D->idSupplier;
                    $this->booking_code         = $TPesananTiket_D->booking_code;
                    $this->departure_date       = $TPesananTiket_D->departure_date;
                    $this->created_at           = $TPesananTiket_D->created_at;
                    $this->updated_at           = $TPesananTiket_D->updated_at;
                    $this->arrival_date         = $TPesananTiket_D->arrival_date;
                    $this->reserve_berangkat    = $TPesananTiket_D->reserve_berangkat;
                    $this->reserve_kembali      = $TPesananTiket_D->reserve_kembali;
                    $this->margin               = $TPesananTiket_D->margin;
                    $this->flag_active          = $TPesananTiket_D->flag_active;
                    $this->exist                = true;
                    $this->sts                = $TPesananTiket_D->sts;
                    $this->idPesanTiket_H = $TPesananTiket_D->idPesanTiket_H;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL TPesanTiket_D_View()"));
    }

    public function get_pesanan_tiket_d($id){
        return DB::select(DB::raw("CALL TPesanTiket_D_View_id($id)"));
    }

    public function get_by_id_emp($id){
        return DB::select(DB::raw("CALL TPesanTiket_D_View_id_emp($id)"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL TPesanTiket_D_Create($this->idSuratTugas_D, $this->AR_ticket_price, $this->AP_ticket_price, 
            $this->idKota, $this->idSupplier, '$this->booking_code', '$this->departure_date',
            '$this->arrival_date', '$this->reserve_berangkat', '$this->reserve_kembali', 
            '$this->sts', $this->idPesanTiket_H)"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL TPesanTiket_D_Update(
            $this->id, $this->idSuratTugas_D, $this->AR_ticket_price, $this->AP_ticket_price, 
            $this->idKota, $this->idSupplier, '$this->booking_code', '$this->departure_date',
            '$this->arrival_date', '$this->reserve_berangkat', '$this->reserve_kembali',
            '$this->sts', $this->idPesanTiket_H)"));
    }

    public function update_status($id,$sts){
        return DB::unprepared(DB::raw("CALL TPesanTiket_D_Update_status($id, '$sts')"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL TPesanTiket_D_Delete($this->id)"));
    }

}