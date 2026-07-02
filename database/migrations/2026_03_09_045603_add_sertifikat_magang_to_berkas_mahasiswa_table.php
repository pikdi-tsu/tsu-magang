<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('berkas_mahasiswa', function (Blueprint $table) {
            $table->string('sertifikat_magang')->nullable()->after('krs_file');
        });
    }

    public function down(): void
    {
        Schema::table('berkas_mahasiswa', function (Blueprint $table) {
            $table->dropColumn('sertifikat_magang');
        });
    }
};