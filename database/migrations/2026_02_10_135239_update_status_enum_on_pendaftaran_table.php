<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE pendaftaran MODIFY COLUMN status ENUM('menunggu', 'diterima', 'ditolak', 'lulus') DEFAULT 'menunggu'");
    }

    public function down(): void
    {
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE pendaftaran MODIFY COLUMN status ENUM('menunggu', 'diterima', 'ditolak') DEFAULT 'menunggu'");
    }
};
