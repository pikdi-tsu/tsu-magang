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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->char('nim', 10);
            $table->char('id_program', 8);
            $table->decimal('nilai_angka', 5, 2)->nullable();
            $table->char('nilai_huruf', 2)->nullable();
            $table->integer('konversi_sks')->nullable();
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
