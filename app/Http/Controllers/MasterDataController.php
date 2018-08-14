<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MJabatan\MJabatanListController as MJabatan,
    App\Http\Controllers\MGolongan\MGolonganListController as MGolongan,
    App\Http\Controllers\MDepartment\MDepartmentListController as MDepartment,
    App\Http\Controllers\MUnitKerja\MUnitKerjaListController as MUnitKerja,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MJenisSupplier\MJenisSupplierListController as MJenisSupplier,
    Illuminate\Http\Request;
use Session;
use Auth;

class MasterDataController extends Controller{

    public function index() {
        return view('modul_master/master-data');
    }

    public function get_list(){
        $data = (new MJabatan)->get_list();
        return view('jabatan')->with('data',$data);
    }

    public function store(Request $request){
//        dd($request);
        $id_user = Auth::user()->id;

        if($id_user){
            if($request->jenis_data == 'jabatan') {
                foreach($request->inputs as $jabatan){
                    $new_jabatan                = new MJabatan();
                    $new_jabatan->created_by    = $id_user;
                    $new_jabatan->updated_by    = $id_user;
                    $new_jabatan->position_name = $jabatan;
                    $new_jabatan->create();
                }
            } else if($request->jenis_data == 'golongan') {
                foreach($request->inputs as $golongan){
                    $new_golongan                = new MGolongan();
                    $new_golongan->created_by    = $id_user;
                    $new_golongan->updated_by    = $id_user;
                    $new_golongan->class_name = $golongan;
                    $new_golongan->create();
                }
            } else if($request->jenis_data == 'departemen') {
                foreach($request->inputs as $department){
                    $new_department                = new MDepartment();
                    $new_department->created_by    = $id_user;
                    $new_department->updated_by    = $id_user;
                    $new_department->department_name = $department;
                    $new_department->create();
                }
            } else if($request->jenis_data == 'unit_kerja') {
                foreach($request->inputs as $unit_kerja){
                    $new_unit_kerja                = new MUnitKerja();
                    $new_unit_kerja->created_by    = $id_user;
                    $new_unit_kerja->updated_by    = $id_user;
                    $new_unit_kerja->work_unit = $unit_kerja;
                    $new_unit_kerja->create();
                }
            } else if($request->jenis_data == 'kota') {
                foreach($request->inputs as $kota){
                    $new_kota                = new MKota();
                    $new_kota->created_by    = $id_user;
                    $new_kota->updated_by    = $id_user;
                    $new_kota->city_name     = $kota;
                    $new_kota->create();
                }
            } else if($request->jenis_data == 'jenis_supplier') {
                foreach($request->inputs as $jenis_supplier){
                    $new_jenis_supplier                = new MJenisSupplier();
                    $new_jenis_supplier->created_by    = $id_user;
                    $new_jenis_supplier->updated_by    = $id_user;
                    $new_jenis_supplier->supplier_type_name     = $jenis_supplier;
                    $new_jenis_supplier->create();
                }
            }


        }

        Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
        return redirect()->back();

    }

    public function delete(Request $request){
        $MJabatan = new MJabatan($request->code);
        $MJabatan->delete();
        return redirect()->back();
    }

    public function edit($code){
        $MJabatan = new MJabatan($code);
        return view('edit-jabatan')->with('jabatan',$MJabatan);
    }

    public function update(Request $request){
        $MJabatan   = new MJabatan($request->code);
        $MJabatan->updated_by    = 1;
        $MJabatan->position_name    = $request->position_name;
        $MJabatan->update();
        return redirect('position');
    }

}
