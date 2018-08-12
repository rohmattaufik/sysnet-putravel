<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MEmployee\MEmployeeListController as MEmployee,
    App\Http\Controllers\MGolongan\MGolonganListController as MGolongan,
    App\Http\Controllers\MJabatan\MJabatanListController as MJabatan,
    App\Http\Controllers\MUnitKerja\MUnitKerjaListController as MUnitKerja,
    Illuminate\Http\Request;

class MEmployeeController extends Controller{

    public function create(){
        $jabatans   = (new MJabatan())->get_list();
        $golongans  = (new MGolongan())->get_list();
        $units      = (new MUnitKerja())->get_list();
        return view("")
            ->with('jabatans',$jabatans)
            ->with('golongans',$golongans)
            ->with('units',$units);
    }
    
    public function insert(Request $request){
        $id_user = Auth::user()->id;
        if($id_user and $request->nik and $request->nama and $request->jabatan){
            $new_employee                      = new MEmployee();
            $new_employee->created_by          = $id_user;
            $new_employee->updated_by          = $id_user;
            $new_employee->NIK                 = $request->nik;
            $new_employee->employee_name       = $request->employee_name;
            $new_employee->idUnitKerja         = $request->idUnitKerja;
            $new_employee->idJabatan           = $request->idJabatan;
            $new_employee->idGolongan          = $request->idGolongan;
            $new_employee->email               = $request->email;
            $new_employee->photo               = $request->file('photo');
            $new_employee->create();
        }
        return view("");
    }
    
}
