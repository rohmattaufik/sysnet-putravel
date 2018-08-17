<?php

namespace App\Http\Controllers\MDIPA;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;


class MDIPAListController extends Controller {

    public $id;
    public $DIPA_code;
    public $idDepartment;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $exist;

    public function __construct($id = false){
        if($id){
            $dipa = DB::table("MDIPA")
                ->where('id',$id)
                ->first();
                if($dipa){
                    $this->id               = $dipa->id;
                    $this->DIPA_code        = $dipa->DIPA_code;
                    $this->created_at       = $dipa->created_at;
                    $this->updated_at       = $dipa->updated_at;
                    $this->created_by       = $dipa->created_by;
                    $this->updated_by       = $dipa->updated_by;
                    $this->idDepartment     = $dipa->idDepartment;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL MDIPA_View()"));
    }

    public function get_dipa($id){
         return DB::select(DB::raw("CALL MDIPA_View_id($id)"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL MDIPA_Create('$this->DIPA_code', '$this->idDepartment', '$this->created_by')"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL MDIPA_Update($this->id, '$this->DIPA_code', '$this->idDepartment', '$this->updated_by')"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL MDIPA_Delete($this->id)"));
    }
}
