<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MBank\MBankListController as MBank,
    Illuminate\Http\Request;
use Session;
use Auth;

class MasterBankController extends Controller
{

    public function index()
    {
        $bank              = (new MBank)->get_list();
        return view('modul_master.master_bank.master-bank')
            ->with('bank' , $bank);
    }

    public function store( Request $request )
    {
//        dd($request);
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            for( $i = 0; $i < count($request->account_number); $i++){
                if($request->account_number[$i] != "" or $request->account_number[$i] != null and $request->account_holder[$i] != "" or $request->account_holder[$i] != null)
                {
                    $new_bank                      = new MBank();
                    $new_bank->account_number      = $request->account_number[$i];
                    $new_bank->account_holder      = $request->account_holder[$i];
                    $new_bank->bank_name           = $request->bank_name[$i];;
                    $new_bank->create();
                }
            }

            Session::flash('sukses-create', 'Anda berhasil menyimpan data Bank');
            return redirect()->back();
        }
    }

    public function edit( $id )
    {
        $bank              = new MBank($id);

        return view('modul_master.master_bank.edit')
              ->with('bank' , $bank);
    }

    public function update( Request $request)
    {
        $admin  = Auth::user()->id;
        if( !is_null($request) ){
            $new_bank                       = new MBank($request->id);
            $new_bank->bank_name            = $request->bank_name;
            $new_bank->account_number       = $request->account_number;
            $new_bank->account_holder       = $request->account_holder;
            $new_bank->update();

            Session::flash('sukses-create', 'Anda berhasil menyimpan data Bank');
            return redirect('master/bank');
        }
    }

    public function delete(Request $request )
    {
        $MBank = new MBank($request->id_bank);
        $MBank->delete();

        Session::flash('sukses-delete', 'Anda berhasil menghapus data Bank');
        return redirect()->back();
    }

}
