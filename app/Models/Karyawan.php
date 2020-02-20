<?php

namespace App\Models;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $primaryKey='id_karyawan';
    protected $table = 'karyawan';
    protected $fillable = ['id_karyawan','nama_lengkap','nama_panggilan','alamat_domisili','negara_domisili','provinsi_domisili','kota_domisili','tempat_lahir','tanggal_lahir','agama','gol_darah','alamat_asal','negara_asal','provinsi_asal','kota_asal','nik','kewarganegaraan','no_passport','status_perkawinan','gender','suku_bangsa','id_posisi','id_user'];
    public $incrementing = false;
}