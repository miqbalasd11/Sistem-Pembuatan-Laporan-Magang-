<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanMagang extends Model
{
    protected $table = 'kegiatan_magang';

    protected $fillable = [
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'judul_kegiatan',
        'deskripsi_kegiatan',
        'status'
    ];
protected function casts(): array
{
    return [
        'tanggal' => 'date',
    ];
}
}