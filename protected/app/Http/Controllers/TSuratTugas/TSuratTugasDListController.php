<?php

namespace App\Http\Controllers\TSuratTugas;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class TSuratTugasDListController extends Controller{

    public $id;
    public $idSuratTugas_H;
    public $idEmployee;
    public $idJabatan;
    public $idGolongan;
    public $hotel_status;
    public $plane_status;
    public $days;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $TSuratTugas_D = DB::table("TSuratTugas_D")
                ->where('id',$id)
                ->first();
                if($TSuratTugas_D){
                    $this->id               = $TSuratTugas_D->id;
                    $this->idSuratTugas_H   = $TSuratTugas_D->idSuratTugas_H;
                    $this->idEmployee       = $TSuratTugas_D->idEmployee;
                    $this->idJabatan        = $TSuratTugas_D->idJabatan;
                    $this->idGolongan       = $TSuratTugas_D->idGolongan;
                    $this->hotel_status     = $TSuratTugas_D->hotel_status;
                    $this->plane_status     = $TSuratTugas_D->plane_status;
                    $this->days             = $TSuratTugas_D->days;
                    $this->flag_active      = $TSuratTugas_D->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL TSuratTugas_D_View()"));
    }

    public function get_surat_tugas_d($id){
        return DB::select(DB::raw("CALL TSuratTugas_D_View_id($id)"));
    }

    public function get_surat_tugas_d_id_h($id_h){
        return DB::select(DB::raw("CALL TSuratTugas_D_View_idSuratH($id_h)"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL TSuratTugas_D_Create(
            $this->idSuratTugas_H, $this->idEmployee, $this->idJabatan, $this->idGolongan,
            '$this->hotel_status', '$this->plane_status', $this->days)"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL TSuratTugas_D_Update(
            $this->id, $this->idSuratTugas_H, $this->idEmployee, $this->idJabatan, $this->idGolongan,
            '$this->hotel_status', '$this->plane_status', $this->days )"));
    }

    public function update_plane_sts(){
        return DB::unprepared(DB::raw("CALL TSuratTugas_D_Update_plane_sts(
            $this->id, '$this->plane_status' )"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL TSuratTugas_D_Delete($this->id)"));
    }

    public function deleteByIdH($id, $idH){
        return DB::unprepared(DB::raw("CALL TSuratTugas_D_Delete_idH($id, $idH)"));
    }

    public function deleteAllByIdH($idH)
    {
        return DB::unprepared(DB::raw("CALL TSuratTugas_D_delete_all_by_idh($idH)"));
    }

}
