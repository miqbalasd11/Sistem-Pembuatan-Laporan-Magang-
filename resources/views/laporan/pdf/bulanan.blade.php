<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Bulanan</title>

<style>
body{
    font-family: DejaVu Sans;
    font-size: 12px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table,th,td{
    border:1px solid #000;
}

th,td{
    padding:5px;
}

.identitas td{
    border:none;
}

h2,h3{
    text-align:center;
    margin:0;
}
.judul{
            margin-bottom:20px;
        }

</style>

</head>
<body>

@php
$profil = \App\Models\ProfilMagang::first();

$namaBulan = [
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
];
@endphp

<div class="judul">
<h2>LAPORAN BULANAN MAGANG</h2>
<h3>Bulan {{ $namaBulan[$nomorBulan] ?? $nomorBulan }} Tahun {{ $tahun }}</h3>
</div>

<table class="identitas" style="border:none;">
    <tr>
        <td width="100">Nama Mahasiswa</td>
        <td>: {{ $profil->nama_mahasiswa ?? '-' }}</td>
    </tr>

    <tr>
        <td>NIM</td>
        <td>: {{ $profil->nim ?? '-' }}</td>
    </tr>

    <tr>
        <td>Program Studi</td>
        <td>: {{ $profil->program_studi ?? '-' }}</td>
    </tr>

    <tr>
        <td>Universitas</td>
        <td>: {{ $profil->universitas ?? '-' }}</td>
    </tr>

    <tr>
        <td>Instansi</td>
        <td>: {{ $profil->perusahaan ?? '-' }}</td>
    </tr>

    <tr>
        <td>Pembimbing Lapangan</td>
        <td>: {{ $profil->pembimbing ?? '-' }}</td>
    </tr>
</table>

<br>

<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="20%">Tanggal</th>
            <th width="8%">Jam Mulai</th>
            <th width="8%">Jam Selesai</th>
            <th width="16%">Judul</th>
            <th width="30%">Deskripsi</th>
            <th width="13%">Status</th>
        </tr>
    </thead>

    <tbody>

    @forelse($kegiatan as $item)

        <tr>

            <td align="center">
                {{ $loop->iteration }}
            </td>

            <td>
{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
            </td>

            <td align="center">
                {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}
            </td>

            <td align="center">
                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
            </td>

            <td>
                {{ $item->judul_kegiatan }}
            </td>

            <td>
                {{ $item->deskripsi_kegiatan }}
            </td>

            <td>
                {{ $item->status }}
            </td>

        </tr>

    @empty

        <tr>
            <td colspan="7" align="center">
                Tidak ada data kegiatan pada bulan ini
            </td>
        </tr>

    @endforelse

    </tbody>
</table>

<br><br>

<table style="border:none;">
    <tr style="border:none;">
        <td style="border:none; width:60%;"></td>

        <td style="border:none; text-align:center;">
            Mengetahui,

            <br><br><br><br><br>

            {{ $profil->pembimbing ?? '-' }}

            <br>

            Pembimbing Lapangan
        </td>
    </tr>
</table>

</body>
</html>