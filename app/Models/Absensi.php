<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $primaryKey='id_absensi';
    protected $table = 'absensi';
    protected $fillable = ['id_absensi','checkin_date', 'checkin_time','check_out_date','check_out_time','lattitude','longitude','id_level','late_reason','leave_reason'];
    public $incrementing = false;
    public $timestamps = false;
}