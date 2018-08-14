<?php

namespace App\Http\Controllers\MSBU;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class MSBUListController extends Controller{

    public $id;
    public $idKota;
    public $idGolongan;
    public $value;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
 //   public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $sbu = DB::table("MSBU")
                ->where('id',$id)
                ->first();
                if($sbu){
                    $this->id               = $sbu->id;
                    $this->idKota           = $sbu->idKota;
                    $this->idGolongan       = $sbu->idGolongan;
                    $this->value            = $sbu->value;
                    $this->created_at       = $sbu->created_at;
                    $this->updated_at       = $sbu->updated_at;
                    $this->created_by       = $sbu->created_by;
                    $this->updated_by       = $sbu->updated_by;
          //          $this->flag_active      = $sbu->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL MSBU_View()"));
    }

    // public function get_sbu($id){
    //     return DB::select(DB::raw("CALL MSBU_()"));
    // }

    public function create(){
        return DB::unprepared(DB::raw("CALL MSBU_Create($this->idKota, $this->idGolongan, '$this->value', '$this->created_by')"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL MSBU_Update($this->id, $this->idKota, $this->idGolongan, '$this->value', '$this->created_by')"));
    }

    // public function delete(){
    //     return DB::unprepared(DB::raw("CALL MSBU_Delete()"));
    // }

}
