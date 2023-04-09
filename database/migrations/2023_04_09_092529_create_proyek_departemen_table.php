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
        Schema::create('proyek_departemen', function (Blueprint $table) {
            $table->id('id_proyek_departemen');

            $table->unsignedBigInteger('id_departemen');
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen');

            $table->unsignedBigInteger('id_proyek');
            $table->foreign('id_proyek')->references('id_proyek')->on('proyek');
            
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
        Schema::dropIfExists('proyek_departemen');
    }
};
