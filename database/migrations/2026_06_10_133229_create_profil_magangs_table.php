<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_magang', function (Blueprint $table) {
            $table->id();

            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('program_studi');
            $table->string('universitas');
            $table->string('perusahaan');
            $table->string('pembimbing');

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_magang');
    }
};