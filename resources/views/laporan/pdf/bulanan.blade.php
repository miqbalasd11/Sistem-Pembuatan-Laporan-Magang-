<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Bulanan Magang</title>

    <style>

        @page{
            size: letter;
            margin: 2.54cm;
        }

        body{
            font-family: "Times New Roman", Times, serif;
            font-size:12pt;
            line-height:1.5;
            color:#000;
        }

        *{
            box-sizing:border-box;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .header h1{
            margin:0;
            font-size:14pt;
            font-weight:bold;
            text-transform:uppercase;
        }

        .header p{
            margin-top:5px;
            font-size:12pt;
        }

        .divider{
            border-top:1.5px solid #000;
            margin-bottom:20px;
        }

        .identitas{
            width:100%;
            margin-bottom:20px;
        }

        .identitas td{
            border:none;
            padding:2px 0;
            vertical-align:top;
        }

        .label{
            width:170px;
        }

        .laporan{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        .laporan th,
        .laporan td{
            border:1px solid #000;
            padding:8px;
            vertical-align:top;
        }

        .laporan th{
            text-align:center;
            font-weight:bold;
        }

        .center{
            text-align:center;
        }

        .judul-kegiatan{
            font-weight:bold;
            margin-bottom:3px;
        }

        .deskripsi-kegiatan{
            text-align:justify;
        }

        .ttd{
            width:100%;
            margin-top:60px;
        }

        .ttd td{
            border:none;
        }

        .ttd-kanan{
            text-align:center;
            width:40%;
        }

        .nama{
            margin-top:80px;
            font-weight:bold;
            text-decoration:underline;
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

<div class="header">

    <h1>
        LAPORAN BULANAN MAGANG
    </h1>

    <p>

        Bulan

        {{ $namaBulan[$nomorBulan] ?? $nomorBulan }}

        Tahun

        {{ $tahun }}

    </p>

</div>

<div class="divider"></div>

<table class="identitas">

    <tr>
        <td class="label">Nama Mahasiswa</td>
        <td width="10">:</td>
        <td>{{ $profil->nama_mahasiswa ?? '-' }}</td>
    </tr>

    <tr>
        <td class="label">NIM</td>
        <td>:</td>
        <td>{{ $profil->nim ?? '-' }}</td>
    </tr>

    <tr>
        <td class="label">Program Studi</td>
        <td>:</td>
        <td>{{ $profil->program_studi ?? '-' }}</td>
    </tr>

    <tr>
        <td class="label">Universitas</td>
        <td>:</td>
        <td>{{ $profil->universitas ?? '-' }}</td>
    </tr>

    <tr>
        <td class="label">Perusahaan / Instansi</td>
        <td>:</td>
        <td>{{ $profil->perusahaan ?? '-' }}</td>
    </tr>

    <tr>
        <td class="label">Pembimbing Lapangan</td>
        <td>:</td>
        <td>{{ $profil->pembimbing ?? '-' }}</td>
    </tr>

</table>

<table class="laporan">

    <thead>

        <tr>

            <th width="6%">
                No
            </th>

            <th width="18%">
                Tanggal
            </th>

            <th width="18%">
                Jam
            </th>

            <th width="43%">
                Kegiatan
            </th>

            <th width="15%">
                Status
            </th>

        </tr>

    </thead>

    <tbody>

        @forelse($kegiatan as $item)

        <tr>

            <td class="center">
                {{ $loop->iteration }}
            </td>

            <td>

                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

            </td>

            <td class="center">

                {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}
                -
                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}

            </td>

            <td>

                <div class="judul-kegiatan">

                    {{ $item->judul_kegiatan }}

                </div>

                <div class="deskripsi-kegiatan">

                    {{ $item->deskripsi_kegiatan }}

                </div>

            </td>

            <td class="center">

                {{ $item->status }}

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="5" class="center">

                Tidak ada data kegiatan pada bulan ini

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

<table class="ttd">

    <tr>

        <td width="60%"></td>

        <td class="ttd-kanan">

            Mengetahui,

            <br>

            Pembimbing Lapangan

            <div class="nama">

                {{ $profil->pembimbing ?? '-' }}

            </div>

        </td>

    </tr>

</table>

</body>
</html>