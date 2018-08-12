<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MJabatan\MJabatanListController as MJabatan,
    Illuminate\Http\Request;

class MJabatanController extends Controller{

    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->jabatans as $jabatan){
                $new_jabatan                = new MJabatan();
                $new_jabatan->created_by    = $id_user;
                $new_jabatan->updated_by    = $id_user;
                $new_jabatan->position_name = $jabatan;
                $new_jabatan->create();
            }
        }
        return view("");
    }

}
