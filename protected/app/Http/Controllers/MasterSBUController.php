<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MGolongan\MGolonganListController as MGolongan,
    App\Http\Controllers\MSBU\MSBUListController as MSBU,
    Illuminate\Http\Request;
use Session;
use Auth;

class MasterSBUController extends Controller
{

    public function index()
    {
        $kotas              = (new MKota)->get_list();
        $golongans          = (new MGolongan)->get_list();

        $sbus               = (new MSBU)->get_list();

        return view('modul_master.master_sbu.master-sbu')
            ->with('kotas' , $kotas)
            ->with('golongans' , $golongans)
            ->with('sbus' , $sbus);
    }

    public function store( Request $request )
    {
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            for( $i = 0; $i < count($request->value); $i++){
                if($request->value[$i] != "" or $request->value[$i] != null)
                {
                    $new_sbu                   = new MSBU();
                    $new_sbu->idKota           = $request->kota[$i];
                    $new_sbu->idGolongan       = $request->golongan[$i];
                    $new_sbu->value            = str_replace('.','',$request->value[$i]);
                    $new_sbu->created_by       = $admin;
                    $new_sbu->updated_by       = $admin;
                    $new_sbu->create();
                }
            }

            Session::flash('sukses-create', 'Anda berhasil menyimpan data SBU');
            return redirect()->back();
        }
    }

    public function edit( $id )
    {
        $kotas              = (new MKota)->get_list();
        $golongans          = (new MGolongan)->get_list();

        $sbu               = (new MSBU)->get_sbu( $id );

        return view('modul_master.master_sbu.edit')
            ->with('kotas' , $kotas)
            ->with('golongans' , $golongans)
            ->with('sbu' , $sbu);
    }

    public function update( Request $request)
    {
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            $new_sbu                   = new MSBU($request->id);
            $new_sbu->idKota           = $request->kota;
            $new_sbu->idGolongan       = $request->golongan;
            $new_sbu->value            = str_replace('.','',$request->value);
            $new_sbu->created_by       = $admin;
            $new_sbu->updated_by       = $admin;
            $new_sbu->update();

            Session::flash('sukses-create', 'Anda berhasil menyimpan data SBU');
            return redirect('master/sbu');
        }
    }

    public function delete(Request $request )
    {
        $MSBU = new MSBU($request->id_sbu);
        $MSBU->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data SBU');
        return redirect()->back();
    }

}