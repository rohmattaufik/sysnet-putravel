<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    Illuminate\Http\Request;

class MDepartmentController extends Controller{

    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->departments as $department){
                $new_dept                   = new MDepartment();
                $new_dept->created_by       = $id_user;
                $new_dept->updated_by       = $id_user;
                $new_dept->department_name  = $department;
                $new_dept->create();
            }
        }
        return view("");
    }
    
}
