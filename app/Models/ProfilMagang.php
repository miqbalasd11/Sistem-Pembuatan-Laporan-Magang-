<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilMagang extends Model
{
    protected $table = 'profil_magang';

    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'program_studi',
        'universitas',
        'perusahaan',
        'pembimbing',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi'
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }
}