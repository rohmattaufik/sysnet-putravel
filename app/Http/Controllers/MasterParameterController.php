<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MTravel\MTravelListController as MTravel,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MJenisSupplier\MJenisSupplierListController as MJenisSupplier,
    Illuminate\Http\Request;
use Session;
use Auth;

class MasterParameterController extends Controller
{
    public function index() {
        $data_travel = (new MTravel)->get_list();

        return view('modul_master/master_parameter/master-parameter')
            ->with('data_travel',$data_travel)
            ;
    }

    public function store(Request $request) {
        if (!is_null($request)) {
            $new_travel                = new MTravel();
            $new_travel->travel_name = $request->nama_travel;
            $new_travel->idJenisSupplier = $request->jenis_supplier;
            $new_travel->supplier_address = $request->alamat;
            $new_travel->contact = $request->contact_person;
            $new_travel->contact_number = $request->no_telp;
            $new_travel->created_by = Auth::user()->id;

            $new_travel->create();
        }

        Session::flash('sukses',"Data travel berhasil diinput.");
        return redirect()->back();
    }

    public function edit($id)
    {
        $MTravel = new MTravel($id);

        return view('modul_master/master_parameter/edit-travel')
            ->with('data_travel', $MTravel);

    }

    public function update(Request $request)
    {
        $id_user = Auth::user()->id;

        if ($id_user) {
            $new_travel                = new MTravel($request->travel_id);
            $new_travel->travel_name = $request->nama_travel;
            $new_travel->idJenisSupplier = $request->jenis_supplier;
            $new_travel->supplier_address = $request->alamat;
            $new_travel->contact = $request->contact_person;
            $new_travel->contact_number = $request->no_telp;

            $new_travel->updated_by = Auth::user()->id;

            $new_travel->update();

            Session::flash('sukses', 'Data travel sukses di-update');
            return redirect(url(action('MasterParameterController@index')));
        }
    }

    public function delete(Request $request)
    {

        $MTravel = new MTravel($request->travel_id);
        $MTravel->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data Travel');
        return redirect()->back();

    }
}
