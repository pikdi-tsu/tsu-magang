<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('konversi_mk', function (Blueprint $table) {
            $table->id();

            // Foreign key ke mahasiswa berdasarkan NIM
            $table->string('nim');

            $table->integer('semester');
            $table->string('tahun_akademik');

            // Relasi ke mata_kuliah berdasarkan kode_mk
            $table->string('kode_mk');

            $table->string('nilai')->nullable();

            $table->timestamps();

            // FK Mahasiswa
            $table->foreign('nim')
                ->references('nim')
                ->on('mahasiswa')
                ->onDelete('cascade');

            // FK Mata Kuliah
            $table->foreign('kode_mk')
                ->references('kode_mk')
                ->on('mata_kuliah')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konversi_mk');
    }
};