<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    Illuminate\Http\Request;

class MKotaController extends Controller{

    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->kotas as $kota){
                $new_kota                   = new MKota();
                $new_kota->created_by       = $id_user;
              //  $new_kota->updated_by       = $id_user;
                $new_kota->city_name        = $kota;
                $new_kota->create();
            }
        }
        return view("");
    }
    
}
