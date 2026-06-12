@extends('layouts.app')

@section('content')

<h2>Detail Kegiatan</h2>

<table class="table">

<tr>
    <th>Tanggal</th>
    <td>
        {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}
    </td>
</tr>

<tr>
    <th>Jam Mulai</th>
    <td>{{ date('H:i', strtotime($kegiatan->jam_mulai)) }}</td>
</tr>

<tr>
    <th>Jam Selesai</th>
    <td>{{ date('H:i', strtotime($kegiatan->jam_selesai)) }}</td>
</tr>

<tr>
    <th>Judul</th>
    <td>{{ $kegiatan->judul_kegiatan }}</td>
</tr>

<tr>
    <th>Deskripsi</th>
    <td>{{ $kegiatan->deskripsi_kegiatan }}</td>
</tr>

<tr>
    <th>Status</th>
    <td>{{ $kegiatan->status }}</td>
</tr>

</table>

@endsection