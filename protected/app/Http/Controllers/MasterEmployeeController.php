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
        $nik = DB::table('MEmployee')->where('NIK', $request->nik)->where('flag_active','1')->get();
        $email = DB::table('MEmployee')->where('email',$request->email)->where('flag_active','1')->get();



        if( count($nik)<1 || count($email)<1 ){
            $new_employee                   = new MEmployee();
            $new_employee->id               = $request->id;
            $new_employee->NIK              = $request->nik;
            $new_employee->employee_name    = $request->nama;
            $new_employee->idUnitKerja      = $request->unit_kerja;
            $new_employee->idJabatan        = $request->jabatan;
            $new_employee->idGolongan       = $request->golongan;
            $new_employee->email            = $request->email;
            $new_employee->phone            = $request->phone;

            if(!is_null($request->file('photo'))) {
                $destinationPath = 'Uploads';
                $movea = $request->file('photo')->move($destinationPath,$request->file('photo')->getClientOriginalName());
                $url_file = "Uploads/{$request->file('photo')->getClientOriginalName()}";
                $new_employee->photo= $url_file;
            }

            $new_employee->created_by       = $admin;
            $new_employee->updated_by       = $admin;
            $new_employee->role             = $request->role;
            $new_employee->password         = bcrypt($request->password);

//            dd($new_employee);
            $new_employee->create();

            Session::flash('sukses', 'Anda berhasil menyimpan data Employee');
            return redirect()->back();
        } else if(count($nik)>0) {
            Session::flash("gagal", "Maaf, data gagal disimpan. Karena NIK : $request->nik sudah ada di database.");
            return redirect()->back();
        } else if(count($email)>0) {
            Session::flash("gagal", "Maaf, data gagal disimpan. Karena E-Mail : $request->email sudah ada di database.");
            return redirect()->back();
        }

        Session::flash("gagal", "Maaf, data gagal disimpan karena input Anda kosong");
        return redirect()->back();
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

        $employee           = new MEmployee($id);
//        dd($employee);
        return view('modul_master.master_employee.edit')
            ->with('unit_kerjas' , $unit_kerjas)
            ->with('employee' , $employee)
            ->with('employee_id',$id)
            ->with('jabatans' , $jabatans)
            ->with('golongans' , $golongans);
    }

    public function update( Request $request )
    {
        $admin  = Auth::user()->id;


        if( !is_null($request->employee_id) ){

            $new_employee                   = new MEmployee( $request->employee_id );
            $new_employee->id               = $request->employee_id;
            $new_employee->NIK              = $request->nik;
            $new_employee->employee_name    = $request->nama;
            $new_employee->idUnitKerja      = $request->unit_kerja;
            $new_employee->idJabatan        = $request->jabatan;
            $new_employee->idGolongan       = $request->golongan;
            $new_employee->email            = $request->email;
            if(!is_null($request->file('photo'))) {
                $destinationPath = "Uploads/employee/{$request->employee_id}";
                $movea = $request->file('photo')->move($destinationPath,$request->file('photo')->getClientOriginalName());
                $url_file = "Uploads/employee/{$request->employee_id}/{$request->file('photo')->getClientOriginalName()}";
                $new_employee->photo= $url_file;
            } else {
                $new_employee->photo= '';
            }
            $new_employee->phone            = $request->phone;
            $new_employee->role     = $request->role;
            $new_employee->updated_by       = $admin;
            $new_employee->password         = bcrypt($request->password);
//            dd($new_employee);
            $new_employee->update();

            Session::flash('sukses', 'Anda berhasil mengubah data Employee');
            return redirect(url(action('MasterEmployeeController@index')));
        } else {
            return redirect()->back();
        }
    }

}
