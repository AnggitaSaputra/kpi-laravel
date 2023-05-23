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
        Schema::create('pegawai_bertugas', function (Blueprint $table) {
            $table->unsignedInteger('id_tugas');
            $table->foreign('id_tugas')->references('id_tugas')->on('tugas');

            $table->unsignedInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
            
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
        Schema::dropIfExists('pegawai_bertugas');
    }
};
