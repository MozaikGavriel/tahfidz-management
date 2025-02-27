<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis')->unique(); // Menggunakan unsigned untuk efisiensi
            $table->string('nama', 255); // Maksimum panjang string disesuaikan
            $table->string('tempat_lahir', 255);
            $table->date('tanggal_lahir');
            $table->string('asal', 255);
            $table->string('kategori', 50); // Sesuaikan panjang maksimal
            $table->string('sekolah')->nullable();
            $table->string('kelas', 20);
            $table->string('alamat', 500)->nullable(); // Meningkatkan kapasitas alamat
            $table->string('no_hp', 15)->nullable(); // Menggunakan string untuk fleksibilitas
            $table->string('email', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('wali_nama');
            $table->string('wali_no_hp')->nullable();
            $table->text('wali_alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
