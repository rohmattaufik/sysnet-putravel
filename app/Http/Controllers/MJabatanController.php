<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB as DB,
    App\Http\Controllers\MJabatan\MJabatanListController as MJabatan,
    Illuminate\Http\Request;
use Session;

class MJabatanController extends Controller{

  public function get_list(){
    $data = (new MJabatan)->get_list();
    return view('jabatan')->with('data',$data);
  }

    public function store(Request $request){
        // // $id_user = Auth::user()->id;
         $id_user = 1;
        if($id_user){
                $new_jabatan                = new MJabatan();
                $new_jabatan->created_by    = $id_user;
                $new_jabatan->updated_by    = $id_user;
                $new_jabatan->position_name = $request->position_name;
                $new_jabatan->create();
        }
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
