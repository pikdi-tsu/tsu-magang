<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->string('kode_mk')->unique()->after('id_matkul');
            $table->string('prodi')->after('semester');
        });
    }

    public function down(): void
    {
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->dropColumn(['kode_mk', 'prodi']);
        });
    }
};