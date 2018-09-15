<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MDIPA\MDIPAListController as MDIPA,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    Illuminate\Http\Request;
use Session;
use Auth;

class MasterDIPAController extends Controller
{

    public function index()
    {
        $departments        = (new MDepartment)->get_list();

        $dipas              = (new MDIPA)->get_list();

        return view('modul_master.master_dipa.master-dipa')
            ->with('departments' , $departments)
            ->with('dipas' , $dipas);
    }

    public function store( Request $request )
    {
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            for( $i = 0; $i < count($request->akun); $i++){
                if($request->akun[$i] != "" or $request->akun[$i] != null)
                {
                    $new_dipa                   = new MDIPA();
                    $new_dipa->idDepartment     = $request->department[$i];
                    $new_dipa->DIPA_code        = $request->akun[$i];
                    $new_dipa->created_by       = $admin;
                    $new_dipa->updated_by       = $admin;
                    $new_dipa->create();
                }
            }

            Session::flash('sukses', 'Anda berhasil menyimpan data DIPA');
            return redirect()->back();
        }
    }

    public function edit( $id )
    {
        $departments        = (new MDepartment)->get_list();

        $dipa              = (new MDIPA)->get_dipa($id);

        return view('modul_master.master_dipa.edit')
            ->with('departments' , $departments)
            ->with('dipa' , $dipa);
    }

    public function update( Request $request)
    {
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            $new_dipa                   = new MDIPA($request->id);
            $new_dipa->idDepartment     = $request->department;
            $new_dipa->DIPA_code       = $request->akun;
            $new_dipa->created_by       = $admin;
            $new_dipa->updated_by       = $admin;
            $new_dipa->update();

            Session::flash('sukses', 'Anda berhasil mengubah data DIPA');
            return redirect('master/dipa');
        }
    }

    public function delete(Request $request )
    {
        $MDIPA = new MDIPA($request->id_dipa);
        $MDIPA->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data DIPA');
        return redirect()->back();
    }

}
