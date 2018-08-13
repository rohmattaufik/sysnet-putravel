<?php

namespace App\Http\Controllers\MDepartment;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class MDepartmentListController extends Controller{

    public $id;
    public $department_name;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $department = DB::table("MDepartment")
                ->where('id',$id)
                ->first();
                if($department){
                    $this->id               = $department->id;
                    $this->department_name  = $department->department_name;
                    $this->created_at       = $department->created_at;
                    $this->updated_at       = $department->updated_at;
                    $this->created_by       = $department->created_by;
                    $this->updated_by       = $department->updated_by;
                    $this->flag_active      = $department->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL MDepartment_View()"));
    }

    // public function get_department($id){
    //     return DB::select(DB::raw("CALL MDepartment_Create()"));
    // }

    public function create(){
        return DB::unprepared(DB::raw("CALL MDepartment_Create('$this->department_name', '$this->created_by')"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL MDepartment_Update($this->id, '$this->department_name', '$this->updated_by')"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL MDepartment_Delete($this->id)"));
    }

}
