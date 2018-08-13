<?php

namespace App\Http\Controllers\MKota;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class MKotaListController extends Controller{

    public $id;
    public $city_name;
    public $created_at;
    public $updated_at;
    public $created_by;
 //   public $updated_by;
 //   public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $kota = DB::table("MKota")
                ->where('id',$id)
                ->first();
                if($kota){
                    $this->id               = $kota->id;
                    $this->city_name        = $kota->city_name;
                    $this->created_at       = $kota->created_at;
                    $this->updated_at       = $kota->updated_at;
                    $this->created_by       = $kota->created_by;
           //         $this->updated_by       = $kota->updated_by;
          //          $this->flag_active      = $kota->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL MKota_View()"));
    }

    // public function get_kota($id){
    //     return DB::select(DB::raw("CALL PREPARATION_DETAIL()"));
    // }

    public function create(){
        return DB::unprepared(DB::raw("CALL MKota_Create('$this->city_name', '$this->created_by')"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL MKota_Update($this->id, '$this->city_name', '$this->created_by')"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL MKota_Delete($this->id)"));
    }

}
