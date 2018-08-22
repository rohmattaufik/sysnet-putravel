<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MUnitKerja\MUnitKerjaListController as MUnitKerja,
    Illuminate\Http\Request;

class MUnitKerjaController extends Controller{

    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->units as $unit){
                $new_unitkerja                = new MUnitKerja();
                $new_unitkerja->created_by    = $id_user;
                $new_unitkerja->updated_by    = $id_user;
                $new_unitkerja->work_unit     = $unit;
                $new_unitkerja->create();
            }
        }
        return view("");
    }

}
