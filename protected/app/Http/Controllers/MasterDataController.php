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

        return view('modul_master/master_data/master-data')
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

        return view('modul_master/master_data/master-data')->with('data',$data);
    }

    public function store(Request $request){
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
                Session::flash('sukses-jabatan', "Data $request->jenis_data berhasil diinput.");
                Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
                return redirect()->back();

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
                Session::flash('sukses-golongan', "Data $request->jenis_data berhasil diinput.");
                Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
                return redirect()->back();

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
                Session::flash('sukses-departemen', "Data $request->jenis_data berhasil diinput.");
                Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
                return redirect()->back();

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
                Session::flash('sukses-unit-kerja', "Data $request->jenis_data berhasil diinput.");
                Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
                return redirect()->back();

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
                Session::flash('sukses-kota', "Data $request->jenis_data berhasil diinput.");
                Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
                return redirect()->back();

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
                Session::flash('sukses-jenis-supplier', "Data $request->jenis_data berhasil diinput.");
                Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
                return redirect()->back();

            }


        }

        Session::flash('sukses',"Data $request->jenis_data berhasil diinput.");
        return redirect()->back();

    }



    public function delete(Request $request){

        if($request->jenis_data == 'jabatan') {
            $MJabatan = new MJabatan($request->jabatan_id);
            $MJabatan->delete();
            Session::flash('sukses-delete', 'Anda berhasil menghapus data Jabatan');
            return redirect()->back();
        } else if($request->jenis_data == 'department') {
            $MDepartment = new MDepartment($request->department_id);
            $MDepartment->delete();
            Session::flash('sukses-delete', 'Anda berhasil menghapus data Department');
            return redirect()->back();
        } else if($request->jenis_data == 'golongan') {
            $MGolongan = new MGolongan($request->golongan_id);
            $MGolongan->delete();
            Session::flash('sukses-delete', 'Anda berhasil menghapus data Golongan');
            return redirect()->back();
        } else if($request->jenis_data == 'unit_kerja') {
            $MUnitKerja = new MUnitKerja($request->unit_kerja_id);
            $MUnitKerja->delete();
            Session::flash('sukses-delete', 'Anda berhasil menghapus data Unit Kerja');
            return redirect()->back();
        } else if($request->jenis_data == 'kota') {
            $MKota = new MKota($request->kota_id);
            $MKota->delete();
            Session::flash('sukses-delete', 'Anda berhasil menghapus data Kota');
            return redirect()->back();
        } else if($request->jenis_data == 'jenis_supplier') {
            $MJenisSupplier = new MJenisSupplier($request->unit_kerja_id);
            $MJenisSupplier->delete();
            Session::flash('sukses-delete', 'Anda berhasil menghapus data Jenis Supplier');
            return redirect()->back();
        }

        Session::flash('sukses-delete', 'Anda tidak menghapus apa-apa.');
        return redirect()->back();
    }

    public function edit($jenis_data, $id){

        if ($jenis_data == 'jabatan') {
            $MJabatan = new MJabatan($id);
            $jenis_data = 'Jabatan';
            $data_id = $id;
            $data_content = $MJabatan->position_name;
            return view('modul_master/master_data/edit')
                ->with('data_content',$data_content)
                ->with('data_id',$data_id)
                ->with('jenis_data_input','jabatan')
                ->with('jenis_data',$jenis_data);

        } else if ($jenis_data == 'department') {
            $MDepartment = new MDepartment($id);
            $jenis_data = 'Department';
            $data_id = $id;
            $data_content = $MDepartment->department_name;
            return view('modul_master/master_data/edit')
                ->with('data_content',$data_content)
                ->with('data_id',$data_id)
                ->with('jenis_data_input','department')
                ->with('jenis_data',$jenis_data);

        } else if ($jenis_data == 'golongan') {
            $MGolongan = new MGolongan($id);
            $jenis_data = 'Golongan';
            $data_id = $id;
            $data_content = $MGolongan->class_name;
            return view('modul_master/master_data/edit')
                ->with('data_content',$data_content)
                ->with('data_id',$data_id)
                ->with('jenis_data_input','golongan')
                ->with('jenis_data',$jenis_data);

        } else if ($jenis_data == 'unit_kerja') {
            $MUnitKerja = new MUnitKerja($id);
            $jenis_data = 'Unit Kerja';
            $data_id = $id;
            $data_content = $MUnitKerja->work_unit;
            return view('modul_master/master_data/edit')
                ->with('data_content',$data_content)
                ->with('data_id',$data_id)
                ->with('jenis_data_input','unit_kerja')
                ->with('jenis_data',$jenis_data);

        } else if ($jenis_data == 'kota') {
            $MKota = new MKota($id);
            $jenis_data = 'Kota';
            $data_id = $id;
            $data_content = $MKota->city_name;
            return view('modul_master/master_data/edit')
                ->with('data_content',$data_content)
                ->with('data_id',$data_id)
                ->with('jenis_data_input','kota')
                ->with('jenis_data',$jenis_data);

        } else if ($jenis_data == 'jenis_supplier') {
            $MJenisSupplier = new MJenisSupplier($id);
            $jenis_data = 'Jenis Supplier';
            $data_id = $id;
            $data_content = $MJenisSupplier->supplier_type_name;
            return view('modul_master/master_data/edit')
                ->with('data_content',$data_content)
                ->with('data_id',$data_id)
                ->with('jenis_data_input','jenis_supplier')
                ->with('jenis_data',$jenis_data);

        }

        return view('modul_master/master_data/edit')->with('jabatan','salah')->with('jenis_data',$jenis_data);
    }

    public function update(Request $request){
        $id_user = Auth::user()->id;

        if($id_user) {

            if ($request->jenis_data == 'jabatan') {
                $MData = new MJabatan($request->data_id);
                $MData->updated_by = $id_user;
                $MData->position_name = $request->data_content;
                $MData->update();

            } else if ($request->jenis_data == 'department') {
                $MData = new MDepartment($request->data_id);
                $MData->updated_by = $id_user;
                $MData->department_name = $request->data_content;
                $MData->update();

            } else if ($request->jenis_data == 'golongan') {
                $MData = new MGolongan($request->data_id);
                $MData->updated_by = $id_user;
                $MData->class_name = $request->data_content;
                $MData->update();

            } else if ($request->jenis_data == 'unit_kerja') {
                $MData = new MUnitKerja($request->data_id);
                $MData->updated_by = $id_user;
                $MData->work_unit = $request->data_content;
                $MData->update();

            } else if ($request->jenis_data == 'kota') {
                $MData = new MKota($request->data_id);
                $MData->updated_by = $id_user;
                $MData->city_name = $request->data_content;
                $MData->update();

            } else if ($request->jenis_data == 'jenis_supplier') {
                $MData = new MJenisSupplier($request->data_id);
                $MData->updated_by = $id_user;
                $MData->supplier_type_name = $request->data_content;
                $MData->update();

            }
        }


        Session::flash('sukses','Data '. $request->jenis_data .' sukses di-update');
        return redirect(url(action('MasterDataController@index')));
    }

}
