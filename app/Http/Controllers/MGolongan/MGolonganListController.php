<?php

namespace App\Http\Controllers\MGolongan;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;


class MGolonganListController extends Controller {

    public $id;
    public $class_name;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $golongan = DB::table("MGolongan")
                ->where('id',$id)
                ->first();
                if($golongan){
                    $this->id               = $golongan->id;
                    $this->class_name       = $golongan->class_name;
                    $this->created_at       = $golongan->created_at;
                    $this->updated_at       = $golongan->updated_at;
                    $this->created_by       = $golongan->created_by;
                    $this->updated_by       = $golongan->updated_by;
                    $this->flag_active      = $golongan->flag_active;
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

    public function get_golongan($id){
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