<?php

namespace App\Models;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $primaryKey='id_skill';
    protected $table = 'skill';
    protected $fillable = ['id_skill','skill_name','description','id_karyawan','score'];
    public $incrementing = false;
}