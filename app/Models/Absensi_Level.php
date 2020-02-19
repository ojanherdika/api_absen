<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi_Level extends Model
{
    // use UsesUuid;
    protected $primaryKey='id_absensi_level';
    protected $guarded = ['uuid'];
    protected $table = 'absensi_level';
    protected $fillable = ['id_absensi_level','level', 'label'];
    public $incrementing = false;
}