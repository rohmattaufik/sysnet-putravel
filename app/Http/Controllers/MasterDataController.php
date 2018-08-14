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
        $data_jabatan = (new MJabatan)->get_list();
        $data_department = (new MDepartment)->get_list();
        $data_golongan = (new MGolongan)->get_list();
        $data_unit_kerja = (new MUnitKerja)->get_list();
        $data_kota = (new MKota)->get_list();
        $data_jenis_supplier = (new MJenisSupplier)->get_list();

        return view('modul_master/master-data')
            ->with('data_jabatan',$data_jabatan)
            ->with('data_department',$data_department)
            ->with('data_golongan',$data_golongan)
            ->with('data_unit_kerja',$data_unit_kerja)
            ->with('data_kota',$data_kota)
            ->with('data_jenis_supplier',$data_jenis_supplier)
            ;
    }

    public function get_list(){
        $data = (new MJabatan)->get_list();

        return view('modul_master/master-data')->with('data',$data);
    }

    public function store_jabatan(Request $request){
//        dd($request);
        $id_user = Auth::user()->id;

        if($id_user){
            if($request->jenis_data == 'jabatan') {
                foreach($request->inputs as $jabatan){
                    if(is_null($jabatan)) {

                    } else {
                        $new_jabatan                = new MJabatan();
                        $new_jabatan->created_by    = $id_user;
                        $new_jabatan->updated_by    = $id_user;
                        $new_jabatan->position_name = $jabatan;
                        $new_jabatan->create();
                    }
                }
            } else if($request->jenis_data == 'golongan') {
                foreach($request->inputs as $golongan){
                    if(is_null($golongan)) {

                    } else {
                        $new_golongan = new MGolongan();
                        $new_golongan->created_by = $id_user;
                        $new_golongan->updated_by = $id_user;
                        $new_golongan->class_name = $golongan;
                        $new_golongan->create();
                    }
                }
            } else if($request->jenis_data == 'departemen') {
                foreach($request->inputs as $department){
                    if(is_null($department)) {

                    } else {
                        $new_department = new MDepartment();
                        $new_department->created_by = $id_user;
                        $new_department->updated_by = $id_user;
                        $new_department->department_name = $department;
                        $new_department->create();
                    }
                }
            } else if($request->jenis_data == 'unit_kerja') {
                foreach($request->inputs as $unit_kerja){
                    if(is_null($unit_kerja)) {

                    } else {
                        $new_unit_kerja = new MUnitKerja();
                        $new_unit_kerja->created_by = $id_user;
                        $new_unit_kerja->updated_by = $id_user;
                        $new_unit_kerja->work_unit = $unit_kerja;
                        $new_unit_kerja->create();
                    }
                }
            } else if($request->jenis_data == 'kota') {
                foreach($request->inputs as $kota){
                    if(is_null($kota)) {

                    } else {
                        $new_kota = new MKota();
                        $new_kota->created_by = $id_user;
                        $new_kota->updated_by = $id_user;
                        $new_kota->city_name = $kota;
                        $new_kota->create();
                    }
                }
            } else if($request->jenis_data == 'jenis_supplier') {
                foreach($request->inputs as $jenis_supplier){
                    if(is_null($jenis_supplier)) {

                    } else {
                        $new_jenis_supplier = new MJenisSupplier();
                        $new_jenis_supplier->created_by = $id_user;
                        $new_jenis_supplier->updated_by = $id_user;
                        $new_jenis_supplier->supplier_type_name = $jenis_supplier;
                        $new_jenis_supplier->create();
                    }
                }
            }


        }

        Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
        return redirect()->back();

    }



    public function delete_jabatan(Request $request){
        $MJabatan = new MJabatan($request->jabatan_id);
        $MJabatan->delete();
        Session::flash('sukses-delete', 'Anda berhasil menghapus data Jabatan');
        return redirect()->back();
    }

    public function edit_jabatan($id){

        $MJabatan = new MJabatan($id);
        return view('modul_master/edit-jabatan')->with('jabatan',$MJabatan);
    }

    public function update_jabatan(Request $request){
        $id_user = Auth::user()->id;

        if($id_user) {
            $MJabatan   = new MJabatan($request->jabatan_id);
            $MJabatan->updated_by    = $id_user;
            $MJabatan->position_name    = $request->position_name;
            $MJabatan->update();
        }


        Session::flash('sukses','Nama Jabatan berhasil di-update');
        return redirect(url(action('MasterDataController@index')));
    }

}
