<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $primaryKey='id_branch';
    protected $table = 'branch';
    protected $fillable = ['id_branch','id_company','uniq_code','lokasi','latitude','longitude','created_by','created_time','id_karyawan'];
    public $incrementing = false;
    public $timestamps = false;
}