<?php

namespace App\Http\Controllers\MSupplier;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;
  
class MSupplierListController extends Controller{

    public $id;
    public $supplier_name;
    public $idJenisSupplier;
    public $supplier_address;
    public $idKota;
    public $email;
    public $contact_number;
    public $website;
    public $contact_person;
    public $contact_person_number;
    public $contact_person_address;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $supplier = DB::table("MSupplier")
                ->where('id',$id)
                ->first();
                if($supplier){
                    $this->id                       = $supplier->id;
                    $this->supplier_name            = $supplier->supplier_name;
                    $this->idJenisSupplier          = $supplier->idJenisSupplier;
                    $this->supplier_address         = $supplier->supplier_address;
                    $this->idKota                   = $supplier->idKota;
                    $this->email                    = $supplier->email;
                    $this->contact_number           = $supplier->contact_number;
                    $this->website                  = $supplier->website;
                    $this->contact_person           = $supplier->contact_person;
                    $this->contact_person_number    = $supplier->contact_person_number;
                    $this->contact_person_address   = $supplier->contact_person_address;
                    $this->created_at               = $supplier->created_at;
                    $this->updated_at               = $supplier->updated_at;
                    $this->created_by               = $supplier->created_by;
                    $this->updated_by               = $supplier->updated_by;
                    $this->flag_active              = $supplier->flag_active;
                    $this->exist                    = true;
                }else{
                    $this->exist                    = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL PREPARATION_DETAIL()"));
    }

    public function get_supplier($id){
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