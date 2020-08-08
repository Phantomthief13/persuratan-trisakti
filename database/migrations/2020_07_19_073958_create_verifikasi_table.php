<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('ditujukan');
            $table->date('tanggal');
            $table->string('perihal');
            $table->string('pemeriksa');
            $table->string('asal');
            $table->string('isi');
            $table->string('status')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('verifikasi');
    }
}
