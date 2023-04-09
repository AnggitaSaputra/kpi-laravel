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
            $table->id('id_pegawai');
            
            $table->unsignedBigInteger('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan');
            
            $table->unsignedBigInteger('id_departemen');
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen');
            
            $table->unsignedBigInteger('id_jabatan');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            
            $table->string('nama_pegawai');
            $table->string('username');
            $table->string('password');
            $table->string('pic');
            $table->string('email');
            $table->string('alamat');
            $table->integer('telepon');
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
