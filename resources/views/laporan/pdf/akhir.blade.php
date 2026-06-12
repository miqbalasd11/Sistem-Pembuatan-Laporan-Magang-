<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Akhir Magang</title>

    <style>
        body{
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        h1,h2,h3{
            text-align:center;
            margin:0;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid #000;
        }

        th, td{
            padding:6px;
            
        }

        .identitas{
            margin-top:10px;
            margin-bottom:15px;
        }

        .identitas td{
            border:none;
            padding:4px;
        }

        .ttd{
            width:300px;
            float:right;
            text-align:center;
            margin-top:40px;
        }
    </style>
</head>
<body>

@php
$profil = \App\Models\ProfilMagang::first();
@endphp

<h1>LAPORAN AKHIR MAGANG</h1>
<h3>Rekapitulasi Seluruh Kegiatan Magang</h3>

<br>

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

    <tr>
        <td>Total Kegiatan</td>
        <td>: {{ $kegiatan->count() }} Kegiatan</td>
    </tr>
</table>

<table>
    <thead>
        <tr>
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
                {{ date('H:i', strtotime($item->jam_mulai)) }}
            </td>

            <td align="center">
                {{ date('H:i', strtotime($item->jam_selesai)) }}
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
                Tidak ada data kegiatan.
            </td>
        </tr>
    @endforelse

    </tbody>
</table>

<div class="ttd">
    <p>Mengetahui,</p>

    <br><br><br><br>

    
        {{ $profil->pembimbing ?? '-' }}
    

    <br>

    Pembimbing Lapangan
</div>

</body>
</html>