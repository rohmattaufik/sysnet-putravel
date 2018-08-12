<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MJenisSupplier\MJenisSupplierListController as MJenisSupplier,
    Illuminate\Http\Request;

class MJenisSupplierController extends Controller{

    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->jenis_suppliers as $supplier){
                $new_jenis                      = new MJenisSupplier();
                $new_jenis->created_by          = $id_user;
                $new_jenis->updated_by          = $id_user;
                $new_jenis->supplier_type_name  = $supplier;
                $new_jenis->create();
            }
        }
        return view("");
    }
    
}
