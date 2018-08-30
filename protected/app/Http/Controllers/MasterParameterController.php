<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MTravel\MTravelListController as MTravel,
    App\Http\Controllers\MSetNumber\MSetNumberListController as MSet,
    App\Http\Controllers\MKota\MKotaListController as MKota,
    App\Http\Controllers\MJenisSupplier\MJenisSupplierListController as MJenisSupplier,
    Illuminate\Http\Request;
use Session;
use Auth;

class MasterParameterController extends Controller
{
    public function index() {
        $data_travel = (new MTravel)->get_list();
        $data_number = (new MSet)->get_list();

        return view('modul_master/master_parameter/master-parameter')
            ->with('data_travel',$data_travel)
            ->with('data_number', $data_number)
            ;
    }

    public function store(Request $request) {
//        dd($request->file('logo'));
        if (!is_null($request)) {
            $new_travel                = new MTravel();
            $new_travel->travel_name = $request->nama_travel;
            $new_travel->address = $request->alamat;
            $new_travel->contact = $request->contact_person;
            $new_travel->contact_number = $request->no_telp;

            $destinationPath = 'Uploads';
            $movea = $request->file('logo')->move($destinationPath,$request->file('logo')->getClientOriginalName());
            $url_file = "Uploads/{$request->file('logo')->getClientOriginalName()}";

            $new_travel->logo= $url_file;

            $new_travel->created_by = Auth::user()->id;
//            dd($new_travel);
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

//        dd($request);
//        dd(Auth::user()->id);
        $id_user = Auth::user()->id;

        if ($id_user) {

            if ($request->jenis_data == 'code_data') {
//                dd($request);
                $new_set_number = new MSet($request->number_id);
                $new_set_number->set_number_code = $request->set_number_code;

                $new_set_number->updated_by = Auth::user()->id;

                $new_set_number->update();

                Session::flash('sukses', 'Data kode sukses di-update');
                Session::flash('jenis','set_number');
                return redirect(url(action('MasterParameterController@index')));

            } else {
                $new_travel = new MTravel($request->travel_id);
                $new_travel->travel_name = $request->nama_travel;
                $new_travel->address = $request->alamat;
                $new_travel->contact = $request->contact_person;
                $new_travel->contact_number = $request->no_telp;

                if(!is_null($request->file('logo'))) {
                    $destinationPath = 'Uploads';
                    $movea = $request->file('logo')->move($destinationPath,$request->file('logo')->getClientOriginalName());
                    $url_file = "Uploads/{$request->file('logo')->getClientOriginalName()}";
                    $new_travel->logo= $url_file;
                }


                $new_travel->updated_by = Auth::user()->id;
//                dd($new_travel);
                $new_travel->update();
            }

            Session::flash('sukses', 'Data Travel sukses di-update');


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
