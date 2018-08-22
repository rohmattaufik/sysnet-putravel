<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MSupplier\MSupplierListController as MSupplier,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MJenisSupplier\MJenisSupplierListController as MJenisSupplier,
    Illuminate\Http\Request;
use Session;
use Auth;


class MasterSupplierController extends Controller
{
    public function index() {

        $data_kota = (new MKota)->get_list();
        $data_jenis_supplier = (new MJenisSupplier)->get_list();
        $data_supplier = (new MSupplier)->get_list();

        return view('modul_master/master_supplier/master-supplier')
            ->with('data_supplier',$data_supplier)
            ->with('data_kota',$data_kota)
            ->with('data_jenis_supplier',$data_jenis_supplier)
            ;
    }

    public function store(Request $request) {
        if (!is_null($request)) {
            $new_supplier                = new MSupplier();
            $new_supplier->supplier_name = $request->nama_supplier;
            $new_supplier->idJenisSupplier = $request->jenis_supplier;
            $new_supplier->supplier_address = $request->alamat;
            $new_supplier->idKota = $request->kota;
            $new_supplier->email = $request->email;
            $new_supplier->contact_number = $request->no_telp;
            $new_supplier->website = $request->website;
            $new_supplier->contact_person = $request->name_cp;
            $new_supplier->contact_person_number = $request->no_telp_cp;
            $new_supplier->contact_person_address = $request->alamat_cp;
            $new_supplier->created_by = Auth::user()->id;

            $new_supplier->create();
        }

        Session::flash('sukses',"Data supplier berhasil diinput.");
        return redirect()->back();
    }

    public function delete(Request $request)
    {

        $MSupplier = new MSupplier($request->supplier_id);
        $MSupplier->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data Supplier');
        return redirect()->back();

    }

    public function edit($id)
    {
        $MSupplier = (new MSupplier($id))->get_supplier()[0];
        $data_kota = (new MKota)->get_list();
        $data_jenis_supplier = (new MJenisSupplier)->get_list();
//        dd($MSupplier);
        return view('modul_master/master_supplier/edit')
            ->with('data_supplier', $MSupplier)
            ->with('data_jenis_supplier', $data_jenis_supplier)
            ->with('data_kota',$data_kota)
            ;

    }

    public function update(Request $request)
    {
        $id_user = Auth::user()->id;

        if ($id_user) {
            $new_supplier                = new MSupplier($request->supplier_id);
            $new_supplier->supplier_name = $request->nama_supplier;
            $new_supplier->idJenisSupplier = $request->jenis_supplier;
            $new_supplier->supplier_address = $request->alamat;
            $new_supplier->idKota = $request->kota;
            $new_supplier->email = $request->email;
            $new_supplier->contact_number = $request->no_telp;
            $new_supplier->website = $request->website;
            $new_supplier->contact_person = $request->name_cp;
            $new_supplier->contact_person_number = $request->no_telp_cp;
            $new_supplier->contact_person_address = $request->alamat_cp;
            $new_supplier->updated_by = Auth::user()->id;

            $new_supplier->update();

            Session::flash('sukses', 'Data supplier sukses di-update');
            return redirect(url(action('MasterSupplierController@index')));
        }
    }


}
