<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('program_magang', function (Blueprint $table) {
            $table->date('program_dimulai')->nullable()->after('nama_program');
            $table->date('program_selesai')->nullable()->after('program_dimulai');
        });
    }

    public function down(): void
    {
        Schema::table('program_magang', function (Blueprint $table) {
            $table->dropColumn(['program_dimulai', 'program_selesai']);
        });
    }
};