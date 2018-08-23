<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MEmployee extends Authenticatable
{
    use Notifiable;

    public $table= 'MEmployee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NIK','employee_name', 'idUnitKerja', 'idJabatan', 'idGolongan', 'email', 'photo','created_at','updated_at','created_by','updated_by','flag_active','phone', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
