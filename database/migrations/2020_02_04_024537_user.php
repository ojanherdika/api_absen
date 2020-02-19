<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table){
        $table->uuid('id_user')->primary();
        $table->string('nama')->nullable();
        $table->string('email')->nullable();
        $table->string('password')->nullable();
        $table->string('role')->nullable();
        $table->string('created_by')->nullable();
        $table->date('created_date')->nullable();
        $table->integer('status')->nullable();
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
        Schema::dropIfExists('users');
    }
}
