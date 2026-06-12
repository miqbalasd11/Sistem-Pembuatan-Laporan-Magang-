<?php

namespace App\Http\Controllers;

use App\Models\KegiatanMagang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ProfilMagang;

class LaporanController extends Controller
{
    /**
     * Laporan Harian
     */
    public function harian(Request $request)
    {
        $tanggal = $request->tanggal;

        $kegiatan = collect();

        if ($tanggal) {
            $kegiatan = KegiatanMagang::whereDate(
                'tanggal',
                $tanggal
            )
            ->orderBy('jam_mulai')
            ->get();
        }

        return view(
            'laporan.harian',
            compact(
                'tanggal',
                'kegiatan'
            )
        );
    }
public function harianPdf()
{
    $tanggal = request('tanggal', now()->toDateString());

    $kegiatan = KegiatanMagang::whereDate('tanggal', $tanggal)
        ->orderBy('jam_mulai')
        ->get();

    $pdf = Pdf::loadView(
        'laporan.pdf.harian',
        compact('kegiatan','tanggal')
    );

    return $pdf->download('Laporan-Harian-Magang.pdf');
}

    /**
     * Laporan Mingguan
     */
    public function mingguan(Request $request)
    {
        $mulai = $request->mulai;
        $selesai = $request->selesai;

        $kegiatan = collect();

        if ($mulai && $selesai) {

            $kegiatan = KegiatanMagang::whereBetween(
                'tanggal',
                [$mulai, $selesai]
            )
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();
        }

        return view(
            'laporan.mingguan',
            compact(
                'mulai',
                'selesai',
                'kegiatan'
            )
        );
    }

public function mingguanPdf(Request $request)
{
    $mulai = $request->mulai;
    $selesai = $request->selesai;

    $kegiatan = KegiatanMagang::whereBetween(
        'tanggal',
        [$mulai, $selesai]
    )
    ->orderBy('tanggal')
    ->orderBy('jam_mulai')
    ->get();

    $pdf = Pdf::loadView(
        'laporan.pdf.mingguan',
        compact(
            'kegiatan',
            'mulai',
            'selesai'
        )
    );

    return $pdf->download(
        'laporan_mingguan.pdf'
    );
}

    /**
     * Laporan Bulanan
     */
    public function bulanan(Request $request)
    {
        $bulan = $request->bulan;

        $kegiatan = collect();

        if ($bulan) {

            $pecah = explode('-', $bulan);

            $tahun = $pecah[0];
            $bulanAngka = $pecah[1];

            $kegiatan = KegiatanMagang::whereYear(
                'tanggal',
                $tahun
            )
            ->whereMonth(
                'tanggal',
                $bulanAngka
            )
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();
        }

        return view(
            'laporan.bulanan',
            compact(
                'bulan',
                'kegiatan'
            )
        );
    }

public function bulananPdf(Request $request)
{
    $bulan = $request->bulan;

    if (!$bulan) {
        $bulan = date('Y-m');
    }

    $pecah = explode('-', $bulan);

    $tahun = $pecah[0];
    $nomorBulan = $pecah[1];

    $kegiatan = KegiatanMagang::whereYear('tanggal', $tahun)
        ->whereMonth('tanggal', $nomorBulan)
        ->orderBy('tanggal')
        ->orderBy('jam_mulai')
        ->get();

    $profil = ProfilMagang::first();

    $pdf = Pdf::loadView(
        'laporan.pdf.bulanan',
        compact(
            'kegiatan',
            'profil',
            'bulan',
            'tahun',
            'nomorBulan'
        )
    );

    return $pdf->download('laporan-bulanan.pdf');
}

    /**
     * Laporan Akhir Magang
     */
    public function akhir()
    {
        $kegiatan = KegiatanMagang::orderBy(
            'tanggal'
        )
        ->orderBy(
            'jam_mulai'
        )
        ->get();

        return view(
            'laporan.akhir',
            compact(
                'kegiatan'
            )
        );
    }
public function akhirPdf()
{
    $kegiatan = KegiatanMagang::orderBy('tanggal')
        ->orderBy('jam_mulai')
        ->get();

    $profil = ProfilMagang::first();

    $pdf = Pdf::loadView(
        'laporan.pdf.akhir',
        compact(
            'kegiatan',
            'profil'
        )
    );

    return $pdf->download('laporan-akhir-magang.pdf');
}
}


