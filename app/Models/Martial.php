<?php

namespace App\Models;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Martial extends Model
{
    protected $primaryKey='id_martial';
    protected $table = 'martial';
    protected $fillable = ['id_martial','martial_description'];
    public $incrementing = false;
    public $timestamps = false;
}