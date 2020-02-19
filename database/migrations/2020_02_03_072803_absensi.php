<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Absensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->uuid('id_absensi')->primary();
            $table->date('checkin_date')->nullable();
            $table->time('checkin_time')->nullable();
            $table->date('check_out_date')->nullable();
            $table->time('check_out_time')->nullable();
            $table->string('lattitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('id_level')->nullable();
            $table->string('late_reason')->nullable();
            $table->string('leave_reason')->nullable();
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
        Schema::dropIfExists('absensi');
    }
}
