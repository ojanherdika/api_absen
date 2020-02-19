<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $primaryKey='id_departement';
    protected $table = 'departement';
    protected $fillable = ['id_departement','nama','telepon','alamat','website','email','created_by','created_time','id_karyawan'];
    public $incrementing = false;
    public $timestamps = false;
}