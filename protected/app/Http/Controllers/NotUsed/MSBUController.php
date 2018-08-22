<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MSBU\MSBUListController as MSBU,
    App\Http\Controllers\MGolongan\MGolonganListController as MGolongan,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    Illuminate\Http\Request;

class MSBUController extends Controller{

    public function create(){
        $kotas      = (new MKota())->get_list();
        $golongans  = (new MGolongan())->get_list();
        return view("")->with('kotas',$kotas)->with('golongans',$golongans);
    }
    
    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            foreach($request->sbus as $sbu){
                $new_sbu                      = new MSBU();
                $new_sbu->created_by          = $id_user;
                $new_sbu->updated_by          = $id_user;
                $new_sbu->value               = $sbu->value;
                $new_sbu->idKota              = $sbu->idKota;
                $new_sbu->idGolongan          = $sbu->idGolongan;
                $new_sbu->create();
            }
        }
        return view("");
    }
    
}
