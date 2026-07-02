<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('logbook', function (Blueprint $table) {
            // Tambah minggu_ke
            if (!Schema::hasColumn('logbook', 'minggu_ke')) {
                $table->integer('minggu_ke')->after('id_program');
            }
        });

        // Ubah uraian jadi text
        DB::statement("ALTER TABLE logbook MODIFY COLUMN uraian_kegiatan TEXT");

        // Ubah enum status
        DB::statement("ALTER TABLE logbook MODIFY COLUMN status_validasi ENUM('belum_dibuka', 'belum_diisi', 'pending', 'disetujui', 'ditolak') DEFAULT 'belum_dibuka'");
    }

    public function down(): void
    {
        Schema::table('logbook', function (Blueprint $table) {
            if (Schema::hasColumn('logbook', 'minggu_ke')) {
                $table->dropColumn('minggu_ke');
            }
        });

        DB::statement("ALTER TABLE logbook MODIFY COLUMN uraian_kegiatan VARCHAR(255)");
        DB::statement("ALTER TABLE logbook MODIFY COLUMN status_validasi ENUM('pending', 'disetujui')");
    }
};