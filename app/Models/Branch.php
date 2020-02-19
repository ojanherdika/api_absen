<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $primaryKey='id_branch';
    protected $table = 'branch';
    protected $fillable = ['id_branch','nama','telepon','alamat','website','email','created_by','created_time','id_karyawan'];
    public $incrementing = false;
    public $timestamps = false;
}