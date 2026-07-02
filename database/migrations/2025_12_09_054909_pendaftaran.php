<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_daftar');
            $table->char('nim', 10);
            $table->char('id_program', 8);
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->integer('jumlah_konversi')->nullable();
            $table->string('cv',50)->nullable();
            $table->string('transkrip_nilai',50)->nullable();
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('id_program')->references('id_program')->on('program_magang')->onDelete('cascade');
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
