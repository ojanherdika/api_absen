<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Karyawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->uuid('id_karyawan')->primary();
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->string('negara_domisili')->nullable();
            $table->string('provinsi_domisili')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('alamat_asal')->nullable();
            $table->string('negara_asal')->nullable();
            $table->string('provinsi_asal')->nullable();
            $table->string('kota_asal')->nullable();
            $table->string('nik')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('no_passport')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('gender')->nullable();
            $table->string('suku_bangsa')->nullable();
            $table->string('id_posisi')->nullable();
            $table->string('id_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
