<?php

namespace App\Http\Controllers\TPesananHotel;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;
  
class TPesananHotelHListController extends Controller{

    public $id;
    public $idSuratTugas_H;
    public $suratPesan_date;
    public $order_code;
    public $start_date;
    public $end_date;
    public $payment_status;
    public $idDIPA;
    public $IdDepartment;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $TPesananHotel_H = DB::table("TPesananHotel_H")
                ->where('id',$id)
                ->first();
                if($TPesananHotel_H){
                    $this->id               = $TPesananHotel_H->id;
                    $this->idSuratTugas_H   = $TPesananHotel_H->idSuratTugas_H;
                    $this->suratPesan_date  = $TPesananHotel_H->suratPesan_date;
                    $this->order_code       = $TPesananHotel_H->order_code;
                    $this->start_date       = $TPesananHotel_H->start_date;
                    $this->end_date         = $TPesananHotel_H->end_date;
                    $this->payment_status   = $TPesananHotel_H->payment_status;
                    $this->idDIPA           = $TPesananHotel_H->idDIPA;
                    $this->IdDepartment     = $TPesananHotel_H->IdDepartment;
                    $this->created_at       = $TPesananHotel_H->created_at;
                    $this->updated_at       = $TPesananHotel_H->updated_at;
                    $this->created_by       = $TPesananHotel_H->created_by;
                    $this->updated_by       = $TPesananHotel_H->updated_by;
                    $this->flag_active      = $TPesananHotel_H->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL TPesananHotel_H_View()"));
    }

    public function get_pesanan_hotel_h($id){
        return DB::select(DB::raw("CALL TPesananHotel_H_View_id($id)"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL TPesananHotel_H_Create($this->idSuratTugas_H, 
                            '$this->suratPesan_date', $this->order_code, '$this->start_date',
                            '$this->end_date', $this->payment_status, $this->idDipa, 
                            $this->IdDepartment, $this->created_by)"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL TPesananHotel_H_Update(
                            $this->id, $this->idSuratTugas_H, 
                            '$this->suratPesan_date', $this->order_code, '$this->start_date',
                            '$this->end_date', $this->payment_status, $this->idDipa, 
                            $this->IdDepartment, $this->created_by)"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL TPesananHotel_H_Delete($this->id)"));
    }

}