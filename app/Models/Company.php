<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey='id_company';
    protected $table = 'company';
    protected $fillable = ['id_company','nama','telepon','alamat','website','email','created_by','created_time','id_karyawan'];
    public $incrementing = false;
    public $timestamps = false;
}