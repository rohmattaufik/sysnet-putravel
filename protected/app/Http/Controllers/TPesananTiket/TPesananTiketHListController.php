<?php

namespace App\Http\Controllers\TPesananTiket;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class TPesananTiketHListController extends Controller{

    public $id;
    public $transaction_date;
    public $idSuratTugas_H;
    public $order_code;
    public $idKota;
    public $order_ticket_status;
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
            $TPesananTiket_H = DB::table("TPesananTiket_H")
                ->where('id',$id)
                ->first();
                if($TPesananTiket_H){
                    $this->id                   = $TPesananTiket_H->id;
                    $this->transaction_date     = $TPesananTiket_H->transaction_date;
                    $this->idSuratTugas_H       = $TPesananTiket_H->idSuratTugas_H;
                    $this->order_code           = $TPesananTiket_H->order_code;
                    $this->idKota               = $TPesananTiket_H->idKota;
                    $this->order_ticket_status  = $TPesananTiket_H->order_ticket_status;
                    $this->idDIPA               = $TPesananTiket_H->idDIPA;
                    $this->IdDepartment         = $TPesananTiket_H->IdDepartment;
                    $this->created_at           = $TPesananTiket_H->created_at;
                    $this->updated_at           = $TPesananTiket_H->updated_at;
                    $this->created_by           = $TPesananTiket_H->created_by;
                    $this->updated_by           = $TPesananTiket_H->updated_by;
                    $this->flag_active          = $TPesananTiket_H->flag_active;
                    $this->exist                = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL TPesananTiket_H_View()"));
    }

    public function get_pesanan_tiket_h($id){
        return DB::select(DB::raw("CALL TPesananTiket_H_View_id($id)"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL TPesananTiket_H_Create(
            $this->order_code, $this->idSuratTugas_H, '$this->transaction_date',
            $this->idKota, $this->order_ticket_status, $this->idDIPA, $this->IdDepartment,
            $this->created_by)"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL TPesananTiket_H_Update(
            $this->id, $this->order_code, $this->idSuratTugas_H, '$this->transaction_date',
            $this->idKota, $this->order_ticket_status, $this->idDIPA, $this->IdDepartment,
            $this->updated_by)"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL TPesananTiket_H_Delete($this->id)"));
    }

}
