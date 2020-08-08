<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor')->unique();
            $table->string('asal');
            $table->date('tanggal');
            $table->string('ditujukan');
            $table->string('perihal');
            $table->string('status')->nullable();
            $table->string('lampiran', 500);
            $table->string('Penerima')->nullable();
            $table->string('isi', 500)->nullable();
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
         Schema::dropIfExists('disposisi');
    }
}
