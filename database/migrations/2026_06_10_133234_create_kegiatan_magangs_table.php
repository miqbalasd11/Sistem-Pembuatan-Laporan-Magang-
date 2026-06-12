<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan_magang', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal');

            $table->time('jam_mulai');

            $table->time('jam_selesai');

            $table->string('judul_kegiatan');

            $table->text('deskripsi_kegiatan');

            $table->enum('status', [
                'Belum Selesai',
                'Sedang Dikerjakan',
                'Selesai'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan_magang');
    }
};