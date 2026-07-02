<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {

            // Hapus kolom dosen_id saja (tanpa drop foreign)
            if (Schema::hasColumn('pendaftaran', 'dosen_id')) {
                $table->dropColumn('dosen_id');
            }

            // Tambahkan foreign key untuk nuptk
            $table->foreign('nuptk')
                ->references('nuptk')
                ->on('dosen')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {

            $table->dropForeign(['nuptk']);
        });
    }
};
