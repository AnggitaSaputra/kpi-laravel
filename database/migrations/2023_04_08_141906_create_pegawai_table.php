<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id_pegawai');
    
            $table->integer('id_perusahaan')->unsigned();
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan');
            
            $table->integer('id_departemen')->unsigned();
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen');
            
            $table->integer('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            
            $table->string('nama_pegawai');
            $table->string('username');
            $table->string('password');
            $table->string('pic');
            $table->string('email');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('no_ktp');
            $table->dateTime('tanggal_masuk');
            $table->dateTime('deleted_at');
            $table->string('created_by');
            $table->string('deleted_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('pegawai');
    }
};
