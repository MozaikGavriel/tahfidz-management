<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tahfidz', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('waktu');
            $table->unsignedBigInteger('santri_id');
            $table->string('nama_ustadz');
            $table->string('surat');
            $table->string('ayat');
            $table->integer('jumlah_juzz');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('santri_id')->references('id')->on('santris')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tahfidz');
    }
};