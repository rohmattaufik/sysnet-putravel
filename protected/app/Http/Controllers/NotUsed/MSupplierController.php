<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MSupplier\MSupplierListController as MSupplier,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MJenisSupplier\MJenisSupplierListController as MJenisSupplier,
    Illuminate\Http\Request;

class MSupplierController extends Controller{

    public function index(){
        $kotas              = (new MKota())->get_list();
        $jenis_suppliers    = (new MJenisSupplier())->get_list();
        $suppliers          = (new MSupplier())->get_list();
        foreach($suppliers as $item)
        {
            $item['jenis_supplier'] = (new MJenisSupplier())->get_jenis_supplier($item->idJenisSupplier);
        }
        return view("modul_master/master-supplier")
            ->with('suppliers',$suppliers)
            ->with('kotas',$kotas)
            ->with('jenis_suppliers',$jenis_suppliers);
    }
    
    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            $new_supplier                           = new MSupplier();
            $new_supplier->created_by               = $id_user;
            $new_supplier->updated_by               = $id_user;
            $new_supplier->supplier_name            = $request->supplier_name;
            $new_supplier->idJenisSupplier          = $request->idJenisSupplier;
            $new_supplier->supplier_address         = $request->supplier_address;
            $new_supplier->idKota                   = $request->idKota;
            $new_supplier->email                    = $request->email;
            $new_supplier->contact_number           = $request->contact_number;
            $new_supplier->website                  = $request->website;
            $new_supplier->contact_person           = $request->contact_person;
            $new_supplier->contact_person_number    = $request->contact_person_number;
            $new_supplier->contact_person_address   = $request->contact_person_address;
            $new_supplier->create();
        }
        return view("");
    }
    
}
