<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Departement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement', function (Blueprint $table){
            $table->uuid('id_departement')->primary();
            $table->string('id_company')->nullable();
            $table->string('id_branch')->nullable();
            $table->string('alias')->nullable();
            $table->string('nama')->nullable();
            $table->string('created_by')->nullable();
            $table->time('created_time')->nullable();
            $table->string('id_karyawan')->nullable();
            $table->string('type')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departement');
    }
}
