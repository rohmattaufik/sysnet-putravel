<?php

namespace App\Http\Controllers\TSuratTugas;

use App\Http\Controllers\Controller,
  Illuminate\Support\Facades\DB as DB,
  Illuminate\Http\Request;

class TSuratTugasHListController extends Controller{

    public $id;
    public $assigment_letter_code;
    public $start_date;
    public $end_date;
    public $idKota;
    public $idDIPA;
    public $description;
    public $idDepartment;
    public $description_1;
    public $plane_status;
    public $assignment_letter_status;
    public $hotel_status;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $updated_by;
    public $flag_active;
    public $suratTugasD;
    public $exist;

    public function __construct($id = false){
        if($id){
            $TSuratTugas_H = DB::table("TSuratTugas_H")
                ->where('id',$id)
                ->first();
                if($TSuratTugas_H){
                    $this->id                       = $TSuratTugas_H->id;
                    $this->assigment_letter_code    = $TSuratTugas_H->assigment_letter_code;
                    $this->start_date               = $TSuratTugas_H->start_date;
                    $this->end_date                 = $TSuratTugas_H->end_date;
                    $this->idKota                   = $TSuratTugas_H->idKota;
                    $this->idDIPA                   = $TSuratTugas_H->idDIPA;
                    $this->description              = $TSuratTugas_H->description;
                    $this->idDepartment             = $TSuratTugas_H->idDepartment;
                    $this->description_1            = $TSuratTugas_H->description_1;
                    $this->plane_status             = $TSuratTugas_H->plane_status;
                    $this->assignment_letter_status = $TSuratTugas_H->assignment_letter_status;
                    $this->hotel_status             = $TSuratTugas_H->hotel_status;
                    $this->created_at               = $TSuratTugas_H->created_at;
                    $this->updated_by               = $TSuratTugas_H->updated_by;
                    $this->updated_at               = $TSuratTugas_H->updated_at;
                    $this->created_by               = $TSuratTugas_H->created_by;
                    $this->flag_active              = $TSuratTugas_H->flag_active;
                    $this->exist                    = true;
                }else{
                    $this->exist            = false;
                }
        }else{

        }
    }

    public function get_list(){
        return DB::select(DB::raw("CALL TSuratTugas_H_View()"));
    }

    public function get_all_list(){
        $data = [];
        $SuratTugasH = DB::select(DB::raw("CALL TSuratTugas_H_View()"));
        foreach($SuratTugasH as $row)
        {
          $item = array(
            "id"                      => $row->id,
            "assignment_letter_code"  => $row->assigment_letter_code,
            "start_date"              => $row->start_date,
            "end_date"                => $row->end_date,
            "idKota"                  => $row->idKota,
            "idDipa"                  => $row->idDIPA,
            "description"             => $row->description,
            "idDepartment"            => $row->idDepartment,
            "description_1"           => $row->description_1,
            "hotel_status"            => $row->hotel_status,
            "assignment_letter_status"=> $row->assignment_letter_status,
            "plane_status"            => $row->plane_status,
            "city_name"               => $row->city_name,
            "created_at"              => $row->created_at,
            "DIPA_code"               => $row->DIPA_code,
            "department_name"         => $row->department_name,
            "employee_name"           => $row->employee_name,
            "suratTugasD"             => DB::select(DB::raw("CALL TSuratTugas_D_View_id($row->id)"))
          );
          array_push($data,$item);
        }
        return $data;

    }

    public function get_last(){
        return DB::select(DB::raw("CALL TSuratTugas_H_View_last()"));
    }

    public function get_surat_tugas_h($id){
        return DB::select(DB::raw("CALL TSuratTugas_H_View_id($id)"));
    }

    public function create(){
        return DB::unprepared(DB::raw("CALL TSuratTugas_H_Create(
            '$this->assigment_letter_code', '$this->start_date', '$this->end_date',
            $this->idKota, $this->idDIPA, '$this->description', $this->idDepartment,
            '$this->description_1', '$this->hotel_status', '$this->plane_status',
            '$this->assignment_letter_status', $this->created_by)"));
    }

    public function update(){
        return DB::unprepared(DB::raw("CALL TSuratTugas_H_Update(
            $this->id, '$this->assigment_letter_code', '$this->start_date', '$this->end_date',
            $this->idKota, $this->idDIPA, '$this->description', $this->idDepartment,
            '$this->description_1', '$this->hotel_status', '$this->plane_status',
            '$this->assignment_letter_status', $this->updated_by
                                        )"));
    }

    public function delete(){
        return DB::unprepared(DB::raw("CALL TSuratTugas_H_Delete($this->id)"));
    }

}
