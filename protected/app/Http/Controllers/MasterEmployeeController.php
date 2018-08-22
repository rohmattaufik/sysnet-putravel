<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MEmployee\MEmployeeListController as MEmployee,
    App\Http\Controllers\MUnitKerja\MUnitKerjaListController as MUnitKerja,
    App\Http\Controllers\MJabatan\MJabatanListController as MJabatan,
    App\Http\Controllers\MGolongan\MGolonganListController as MGolongan,
    Illuminate\Http\Request;
use Session;
use Auth;

class MasterEmployeeController extends Controller
{

    public function index()
    {
        $unit_kerjas        = (new MUnitKerja)->get_list();
        $jabatans           = (new MJabatan)->get_list();
        $golongans          = (new MGolongan)->get_list();

        $employees          = (new MEmployee)->get_list();

        return view('modul_master.master_employee.master-employee')
            ->with('unit_kerjas' , $unit_kerjas)
            ->with('employees' , $employees)
            ->with('jabatans' , $jabatans)
            ->with('golongans' , $golongans);
    }

    public function store( Request $request )
    {
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            $new_employee                   = new MEmployee();
            $new_employee->id               = $request->id;
            $new_employee->NIK              = $request->nik;
            $new_employee->employee_name    = $request->nama;
            $new_employee->idUnitKerja      = $request->unit_kerja;
            $new_employee->idJabatan        = $request->jabatan;
            $new_employee->idGolongan       = $request->golongan;
            $new_employee->email            = $request->email;
            $new_employee->phone            = $request->phone;
            $new_employee->photo            = $request->file('photo');
            $new_employee->created_by       = $admin;
            $new_employee->updated_by       = $admin;
            $new_employee->create();

            Session::flash('sukses-create', 'Anda berhasil menyimpan data Employee');
            return redirect()->back();
        }
    }

    public function delete( Request $request )
    {
        $MEmployee = new MEmployee($request->employee_id);
        $MEmployee->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data Employee');
        return redirect()->back();
    }

    public function edit( $id )
    {
        $unit_kerjas        = (new MUnitKerja)->get_list();
        $jabatans           = (new MJabatan)->get_list();
        $golongans          = (new MGolongan)->get_list();

        $employee           = (new MEmployee($id))->get_employee()[0];

        return view('modul_master.master_employee.edit')
            ->with('unit_kerjas' , $unit_kerjas)
            ->with('employee' , $employee)
            ->with('jabatans' , $jabatans)
            ->with('golongans' , $golongans);
    }

    public function update( Request $request )
    {
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            $file = $request->file('photo');
            $new_employee                   = new MEmployee( $request->employee_id );
            $new_employee->id               = $request->id;
            $new_employee->NIK              = $request->nik;
            $new_employee->employee_name    = $request->nama;
            $new_employee->idUnitKerja      = $request->unit_kerja;
            $new_employee->idJabatan        = $request->jabatan;
            $new_employee->idGolongan       = $request->golongan;
            $new_employee->email            = $request->email;
            $new_employee->photo            = $file->openFile()->fread($file->getSize());
            $new_employee->phone            = $request->phone;
            $new_employee->created_by       = $admin;
            $new_employee->updated_by       = $admin;
            $new_employee->edit();

            Session::flash('sukses-update', 'Anda berhasil mengubah data Employee');
            return redirect()->back();
        }
    }

}
