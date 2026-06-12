<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Mingguan Magang</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
        }

        h2,h3{
            text-align:center;
            margin:0;
        }

        .judul{
            margin-bottom:20px;
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
            margin-bottom:15px;
        }

        .identitas td{
            border:none;
            padding:3px;
        }
    </style>
</head>
<body>

@php
    $profil = \App\Models\ProfilMagang::first();
@endphp

<div class="judul">
    <h2>LAPORAN MINGGUAN MAGANG</h2>

    <h3>
        Periode :
        {{ \Carbon\Carbon::parse($mulai)->translatedFormat('d F Y') }}
        s/d
        {{ \Carbon\Carbon::parse($selesai)->translatedFormat('d F Y') }}
    </h3>
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

            <td >
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
                Tidak ada data kegiatan pada minggu ini
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