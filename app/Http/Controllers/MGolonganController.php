<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MGolongan\MGolonganListController as MGolongan,
    Illuminate\Http\Request;

class MGolonganController extends Controller{

    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->golongans as $golongan){
                $new_golongan                = new MGolongan();
                $new_golongan->created_by    = $id_user;
                $new_golongan->updated_by    = $id_user;
                $new_golongan->class_name    = $golongan;
                $new_golongan->create();
            }
        }
        return view("");
    }
    
}
