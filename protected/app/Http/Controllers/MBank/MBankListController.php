<?php

namespace App\Http\Controllers\MBank;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;


class MBankListController extends Controller {

    public $id;
    public $account_number;
    public $account_holder;
    public $bank_name;
    public $exist;

    public function __construct($id = false){
        if($id){
            $bank = DB::table("MBank")
                ->where('id',$id)
                ->first();
                if($bank){
                    $this->id               = $bank->id;
                    $this->account_number   = $bank->account_number;
                    $this->account_holder   = $bank->account_holder;
                    $this->bank_name        = $bank->bank_name;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }
}
