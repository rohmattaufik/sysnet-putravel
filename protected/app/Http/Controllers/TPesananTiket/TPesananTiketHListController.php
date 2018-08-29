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

    public function get_last(){
        return DB::select(DB::raw("CALL TPesananTiket_H_View_last"));
    }


    public function get_all_list(){
        $data = [];

        $data_tiket = DB::select(DB::raw("CALL TPesananTiket_H_View()"));
        $count = 0;
        foreach($data_tiket as $row) {
            $item = array(
                "id"  => $row->id,
                "transaction_date"  => $row->transaction_date,
                "idSuratTugas_H"  => $row->idSuratTugas_H,
                "order_code"  => $row->order_code,
                "idKota"  => $row->idKota,
                "order_ticket_status"  => $row->order_ticket_status,
                "idDIPA"  => $row->idDIPA,
                "idDepartment"  => $row->idDepartment,
                "created_at"  => $row->created_at,
                "updated_at"  => $row->updated_at,
                "created_by"  => $row->created_by,
                "updated_by"  => $row->updated_by,
                "assigment_letter_code" => $row->assigment_letter_code,
                "pesanTiketD"             => DB::select(DB::raw("CALL TPesanTiket_D_View_idH($row->id)"))
            );
            array_push($data,$item);

            $count++;
        }
        return $data;
    }

    public function get_all_list_pembuat_surat(){
        $data = [];

        $data_tiket = DB::select(DB::raw("CALL TPesananTiket_H_View()"));
        $count = 0;
        foreach($data_tiket as $row) {
            $item = array(
                "id"  => $row->id,
                "transaction_date"  => $row->transaction_date,
                "idSuratTugas_H"  => $row->idSuratTugas_H,
                "order_code"  => $row->order_code,
                "idKota"  => $row->idKota,
                "order_ticket_status"  => $row->order_ticket_status,
                "idDIPA"  => $row->idDIPA,
                "idDepartment"  => $row->idDepartment,
                "created_at"  => $row->created_at,
                "updated_at"  => $row->updated_at,
                "created_by"  => $row->created_by,
                "updated_by"  => $row->updated_by,
                "assigment_letter_code" => $row->assigment_letter_code,
                "pesanTiketD"             => DB::select(DB::raw("CALL TPesanTiket_D_View_idH_pembuat_surat($row->id)"))
            );
            array_push($data,$item);

            $count++;
        }
        return $data;
    }

    public function get_all_list_konfirmasi_pembayaran_tiket(){
        $data = [];

        $data_tiket = DB::select(DB::raw("CALL TPesananTiket_H_View()"));
        $count = 0;
        foreach($data_tiket as $row) {
            $item = array(
                "id"  => $row->id,
                "transaction_date"  => $row->transaction_date,
                "idSuratTugas_H"  => $row->idSuratTugas_H,
                "order_code"  => $row->order_code,
                "idKota"  => $row->idKota,
                "order_ticket_status"  => $row->order_ticket_status,
                "idDIPA"  => $row->idDIPA,
                "idDepartment"  => $row->idDepartment,
                "created_at"  => $row->created_at,
                "updated_at"  => $row->updated_at,
                "created_by"  => $row->created_by,
                "updated_by"  => $row->updated_by,
                "assigment_letter_code" => $row->assigment_letter_code,
                "pesanTiketD"             => DB::select(DB::raw("CALL TPesanTiket_D_View_idH_bayartiket($row->id)"))
            );
            array_push($data,$item);

            $count++;
        }
        return $data;
    }

    public function get_all_list_travel(){
        $data = [];

        $data_tiket = DB::select(DB::raw("CALL TPesananTiket_H_View()"));
        $count = 0;
        foreach($data_tiket as $row) {
            $item = array(
                "id"  => $row->id,
                "transaction_date"  => $row->transaction_date,
                "idSuratTugas_H"  => $row->idSuratTugas_H,
                "order_code"  => $row->order_code,
                "idKota"  => $row->idKota,
                "order_ticket_status"  => $row->order_ticket_status,
                "idDIPA"  => $row->idDIPA,
                "idDepartment"  => $row->idDepartment,
                "created_at"  => $row->created_at,
                "updated_at"  => $row->updated_at,
                "created_by"  => $row->created_by,
                "updated_by"  => $row->updated_by,
                "assigment_letter_code" => $row->assigment_letter_code,
                "pesanTiketD"             => DB::select(DB::raw("CALL TPesanTiket_D_View_idH_travel($row->id)"))
            );
            array_push($data,$item);

            $count++;
        }
        return $data;
    }

    public function get_all_list_piutang(){
        $data = [];

        $data_tiket = DB::select(DB::raw("CALL TPesananTiket_H_View()"));
        $count = 0;
        foreach($data_tiket as $row) {
            $item = array(
                "id"  => $row->id,
                "transaction_date"  => $row->transaction_date,
                "idSuratTugas_H"  => $row->idSuratTugas_H,
                "order_code"  => $row->order_code,
                "idKota"  => $row->idKota,
                "order_ticket_status"  => $row->order_ticket_status,
                "idDIPA"  => $row->idDIPA,
                "idDepartment"  => $row->idDepartment,
                "created_at"  => $row->created_at,
                "updated_at"  => $row->updated_at,
                "created_by"  => $row->created_by,
                "updated_by"  => $row->updated_by,
                "assigment_letter_code" => $row->assigment_letter_code,
                "pesanTiketD"             => DB::select(DB::raw("CALL TPesanTiket_D_View_idH_piutang($row->id)"))
            );
            array_push($data,$item);

            $count++;
        }
        return $data;
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

    public function update_status_pembuat_surat($id,$sts){
        return DB::unprepared(DB::raw("CALL TPesananTiket_H_Update_sts($id, $sts)"));
    }

    public function update_status_travel($id,$sts){
        return DB::unprepared(DB::raw("CALL TPesananTiket_H_Update_sts($id, $sts)"));
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
