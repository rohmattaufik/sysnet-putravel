<?php

namespace App\Http\Controllers\MJenisSupplier;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;
  
class MJenisSupplierListController extends Controller{

    public $id;
    public $supplier_type_name;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $jenis_supplier = DB::table("MJenisSupplier")
                ->where('id',$id)
                ->first();
                if($jenis_supplier){
                    $this->id                   = $jenis_supplier->id;
                    $this->supplier_type_name   = $jenis_supplier->supplier_type_name;
                    $this->created_at           = $jenis_supplier->created_at;
                    $this->updated_at           = $jenis_supplier->updated_at;
                    $this->created_by           = $jenis_supplier->created_by;
                    $this->updated_by           = $jenis_supplier->updated_by;
                    $this->flag_active          = $jenis_supplier->flag_active;
                    $this->exist                = true;
                }else{
                    $this->exist                = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL PREPARATION_DETAIL()"));
    }

    public function get_jenis_supplier($id){
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