<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $primaryKey='id_departement';
    protected $table = 'departement';
    protected $fillable = ['id_departement','id_company','id_branch','alias','nama','created_by','created_time','id_karyawan','type'];
    public $incrementing = false;
    public $timestamps = false;
}