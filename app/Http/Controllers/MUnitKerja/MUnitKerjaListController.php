<?php

namespace App\Http\Controllers\MUnitKerja;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;
  
class MUnitKerjaListController extends Controller{

    public $id;
    public $work_unit;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $unit_kerja = DB::table("MUnitKerja")
                ->where('id',$id)
                ->first();
                if($unit_kerja){
                    $this->id               = $unit_kerja->id;
                    $this->work_unit        = $unit_kerja->work_unit;
                    $this->created_at       = $unit_kerja->created_at;
                    $this->updated_at       = $unit_kerja->updated_at;
                    $this->created_by       = $unit_kerja->created_by;
                    $this->updated_by       = $unit_kerja->updated_by;
                    $this->flag_active      = $unit_kerja->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL PREPARATION_DETAIL()"));
    }

    public function get_unit_kerja($id){
        return DB::select(DB::raw("CALL PREPARATION_DETAIL()"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL PREPARATION_DETAIL()"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL PREPARATION_DETAIL()"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL PREPARATION_DETAIL()"));
    }

}