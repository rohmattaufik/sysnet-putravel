<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDIPA,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    Illuminate\Http\Request;

class MDIPAController extends Controller{

    public function create(){
        $departments        = (new MDepartments())->get_list();
        return view("")
            ->with('departments',$departments);
    }

    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->dipas as $dipa){
                $new_dipa                   = new MDepartment();
                $new_dipa->created_by       = $id_user;
                $new_dipa->updated_by       = $id_user;
                $new_dipa->DIPA_code        = $dipa->dipa_code;
                $new_dipa->idDepartment     = $dipa->idDepartment;
                $new_dipa->create();
            }
        }
        return view("");
    }
    
}
