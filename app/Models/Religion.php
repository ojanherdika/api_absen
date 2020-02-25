<?php

namespace App\Models;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $primaryKey='id_religion';
    protected $table = 'religion';
    protected $fillable = ['id_religion','religion_description'];
    public $incrementing = false;
}