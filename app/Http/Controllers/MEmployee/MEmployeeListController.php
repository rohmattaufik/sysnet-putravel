<?php

namespace App\Http\Controllers\MEmployee;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;


class MEmployeeListController extends Controller {

    public $id;
    public $NIK;
    public $employee_name;
    public $idUnitKerja;
    public $idJabatan;
    public $idGolongan;
    public $email;
    public $photo;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $employee = DB::table("MEmployee")
                ->where('id',$id)
                ->first();
                if($employee){
                    $this->id               = $employee->id;
                    $this->NIK              = $employee->NIK;
                    $this->employee_name    = $employee->employee_name;
                    $this->idUnitKerja      = $employee->idUnitKerja;
                    $this->idJabatan        = $employee->idJabatan;
                    $this->idGolongan       = $employee->idGolongan;
                    $this->email            = $employee->email;
                    $this->photo            = $employee->photo;
                    $this->created_at       = $employee->created_at;
                    $this->updated_at       = $employee->updated_at;
                    $this->created_by       = $employee->created_by;
                    $this->updated_by       = $employee->updated_by;
                    $this->flag_active      = $employee->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL MEmployee_View()"));
    }

    public function get_employee($id){
         return DB::select(DB::raw("CALL MEmployee_View_id($this->id)"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL MEmployee_Create('$this->NIK', '$this->employee_name', $this->idUnitKerja, $this->idJabatan, $this->idGolongan, '$this->email', '$this->photo', '$this->created_by')"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL MEmployee_Update($this->id, '$this->NIK', '$this->employee_name', $this->idUnitKerja, $this->idJabatan, $this->idGolongan, '$this->email', '$this->photo', '$this->created_by')"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL MEmployee_Delete($this->id)"));
    }
}
