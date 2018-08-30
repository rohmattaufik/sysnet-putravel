<?php

namespace App\Http\Controllers\MTravel;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class MTravelListController extends Controller{

    public $id;
    public $travel_name;
    public $address;
    public $contact;
    public $contact_number;
    public $logo;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $exist;

    public function __construct($id = false){
        if($id){
            $travel = DB::table("MTravel")
                ->where('id',$id)
                ->first();
                if($travel){
                    $this->id               = $travel->id;
                    $this->travel_name      = $travel->travel_name;
                    $this->address          = $travel->address;
                    $this->contact          = $travel->contact;
                    $this->contact_number   = $travel->contact_number;
                    $this->logo             = $travel->logo;
                    $this->created_at       = $travel->created_at;
                    $this->updated_at       = $travel->updated_at;
                    $this->created_by       = $travel->created_by;
                    $this->updated_by       = $travel->updated_by;
                    $this->flag_active      = $travel->flag_active;
                    $this->exist            = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL MTravel_View()"));
    }

    // public function get_travel($id){
    //     return DB::select(DB::raw("CALL PREPARATION_DETAIL()"));
    // }

    public function create(){
        return DB::unprepared(DB::raw("CALL MTravel_Create('$this->travel_name', '$this->address', '$this->contact', '$this->contact_number', '$this->logo', '$this->created_by')"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL MTravel_Update($this->id, '$this->travel_name', '$this->address', '$this->contact', '$this->contact_number', '$this->logo', '$this->updated_by')"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL MTravel_Delete($this->id)"));
    }

}
