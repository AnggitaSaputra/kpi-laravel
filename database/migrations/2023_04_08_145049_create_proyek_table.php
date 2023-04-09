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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id('id_proyek');
            $table->string('nama_proyek');
            $table->string('deskripsi_proyek');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->time('estimasi_durasi');
            $table->string('status');
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
        Schema::dropIfExists('proyek');
    }
};
