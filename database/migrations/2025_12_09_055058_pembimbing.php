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
        Schema::create('pembimbing', function (Blueprint $table) {
            $table->id('id_pembimbing');
            $table->char('id_program', 8);
            $table->char('nuptk', 16);
            $table->char('nim', 10);
            $table->foreign('nuptk')->references('nuptk')->on('dosen')->onDelete('cascade');
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
