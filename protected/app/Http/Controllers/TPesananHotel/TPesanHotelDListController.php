<?php

namespace App\Http\Controllers\TPesananHotel;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;
  
class TPesanHotelDListController extends Controller{

    public $id;
    public $idPesananHotel;
    public $idSuratTugasD;
    public $idKota;
    public $idSupplier;
    public $payment_status;
    public $checkin_date;
    public $checkout_date;
    public $voucher_number;
    public $AR_price;
    public $AP_price;
    public $margin_double;
    public $created_at;
    public $updated_at;
    public $term;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $TPesananHotel_D = DB::table("TPesanHotel_D")
                ->where('id',$id)
                ->first();
                if($TPesananHotel_D){
                    $this->id               = $TPesananHotel_D->id;
                    $this->idPesananHotel   = $TPesananHotel_D->idPesananHotel;
                    $this->idSuratTugasD    = $TPesananHotel_D->idSuratTugas_D;
                    $this->idKota           = $TPesananHotel_D->idKota;
                    $this->idSupplier       = $TPesananHotel_D->idSupplier;
                    $this->payment_status   = $TPesananHotel_D->payment_status;
                    $this->checkin_date     = $TPesananHotel_D->checkin_date;
                    $this->checkout_date    = $TPesananHotel_D->checkout_date;
                    $this->created_at       = $TPesananHotel_D->created_at;
                    $this->updated_at       = $TPesananHotel_D->updated_at;
                    $this->voucher_number   = $TPesananHotel_D->voucher_number;
                    $this->AR_price         = $TPesananHotel_D->AR_price;
                    $this->AP_price         = $TPesananHotel_D->AP_price;
                    $this->margin_double    = $TPesananHotel_D->margin_double;
                    $this->flag_active      = $TPesananHotel_D->flag_active;
                    $this->term             = $TPesananHotel_D->term;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL TPesananHotel_D_View()"));
    }

    public function get_pesanan_hotel_d($id){
        return DB::select(DB::raw("CALL TPesananHotel_D_View_id($id)"));
    }

    public function get_by_employee( $id_employee, $payment_status)
    {
        return DB::select(DB::raw("CALL TPesananHotel_D_get_by_employee($id_employee, $payment_status)"));
    }

    public function get_by_payment( $payment_status)
    {
        return DB::select(DB::raw("CALL TPesananHotel_D_get_by_payment( $payment_status)"));
    }

    public function create(){
        //dd($this->AR_price);
        return DB::unprepared(DB::raw("CALL TPesanHotel_D_Create(
            $this->idPesananHotel, $this->idSuratTugasD, $this->idKota, $this->idSupplier,
            '$this->payment_status', '$this->checkin_date', '$this->checkout_date', 
            '$this->voucher_number',$this->AR_price, $this->AP_price, $this->term )"));
    }

    public function update(){
        
        return DB::unprepared(DB::raw("CALL TPesanHotel_D_Update(
            $this->id, $this->idPesananHotel, $this->idSuratTugasD, $this->idKota, $this->idSupplier,
            '$this->payment_status', '$this->checkin_date', '$this->checkout_date', 
            '$this->voucher_number',$this->AR_price, $this->AP_price, $this->term)"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL TPesananHotel_D_Delete($this->id)"));
    }

}