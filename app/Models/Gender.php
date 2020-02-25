<?php

namespace App\Models;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $primaryKey='id_gender';
    protected $table = 'gender';
    protected $fillable = ['id_gender','gender_description'];
    public $incrementing = false;
    public $timestamps = false;
}