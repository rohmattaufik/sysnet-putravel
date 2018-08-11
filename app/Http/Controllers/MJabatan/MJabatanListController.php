<?php

namespace App\Http\Controllers\MJabatan;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;
  
class MJabatanListController extends Controller{

    public $id;
    public $position_name;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $jabatan = DB::table("MJabatan")
                ->where('id',$id)
                ->first();
                if($jabatan){
                    $this->id               = $jabatan->id;
                    $this->position_name    = $jabatan->position_name;
                    $this->created_at       = $jabatan->created_at;
                    $this->updated_at       = $jabatan->updated_at;
                    $this->created_by       = $jabatan->created_by;
                    $this->updated_by       = $jabatan->updated_by;
                    $this->flag_active      = $jabatan->flag_active;
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

    public function get_jabatan($id){
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