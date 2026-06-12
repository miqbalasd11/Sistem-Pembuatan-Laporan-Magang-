<?php

namespace App\Http\Controllers;

use App\Models\KegiatanMagang;
use App\Models\ProfilMagang;

class DashboardController extends Controller
{
    public function index()
    {
        // Total kegiatan
        $totalKegiatan = KegiatanMagang::count();

        // Total hari magang berdasarkan tanggal unik
        $totalHariMagang = KegiatanMagang::distinct('tanggal')
            ->count('tanggal');

        // Total kegiatan selesai
        $totalSelesai = KegiatanMagang::where(
            'status',
            'Selesai'
        )->count();

        // Total kegiatan pending
        $totalPending = KegiatanMagang::whereIn('status', ['Sedang Dikerjakan', 'Belum Selesai'])->count();

        // Kegiatan terbaru
        $kegiatanTerbaru = KegiatanMagang::latest()
            ->take(5)
            ->get();

        // Profil magang (1 data)
        $profil = ProfilMagang::first();

        return view('dashboard.index',
            compact(
                'totalKegiatan',
                'totalHariMagang',
                'totalSelesai',
                'totalPending',
                'kegiatanTerbaru',
                'profil'
            )
        );
    }
}