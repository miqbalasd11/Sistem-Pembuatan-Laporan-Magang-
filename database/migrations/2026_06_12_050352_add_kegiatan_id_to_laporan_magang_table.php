<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan_magang', function (Blueprint $table) {

            $table->foreignId('kegiatan_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('kegiatan_magang')
                  ->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::table('laporan_magang', function (Blueprint $table) {

            $table->dropForeign(['kegiatan_id']);
            $table->dropColumn('kegiatan_id');

        });
    }
};