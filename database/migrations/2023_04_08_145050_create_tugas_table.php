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
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id_tugas');

            $table->unsignedInteger('id_parameter');
            $table->foreign('id_parameter')->references('id_parameter')->on('parameter');
            
            $table->unsignedInteger('id_proyek');
            $table->foreign('id_proyek')->references('id_proyek')->on('proyek');

            $table->string('nama_tugas');
            $table->string('deskripsi');
            $table->string('prioritas');
            $table->string('status');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->integer('bobot');
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
        Schema::dropIfExists('tugas');
    }
};
