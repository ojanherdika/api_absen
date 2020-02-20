<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi_Level extends Model
{
    protected $primaryKey='id_absensi_level';
    protected $table = 'absensi_level';
    protected $fillable = ['id_absensi_level','level', 'label'];
    public $incrementing = false;
    public $timestamps = false;
}