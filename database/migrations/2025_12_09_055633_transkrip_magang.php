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
        Schema::create('transkrip_magang', function (Blueprint $table) {
            $table->id('id_transkrip');
            $table->char('id_mitra', 8);
            $table->char('nim', 10);
            $table->string('course', 100);
            $table->integer('hours');
            $table->integer('suggested_sks');
            $table->decimal('nilai', 3, 2);
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
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
