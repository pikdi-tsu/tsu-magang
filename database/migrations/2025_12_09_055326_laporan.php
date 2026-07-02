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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->char('nim', 10);
            $table->char('id_program', 8);
            $table->string('laporan_akhir', 255)->nullable();
            $table->string('sertifikat', 255)->nullable();
            $table->string('transkrip_nilai', 255)->nullable();
            $table->enum('status_validasi', ['belum divalidasi', 'divalidasi'])->default('belum divalidasi');
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
