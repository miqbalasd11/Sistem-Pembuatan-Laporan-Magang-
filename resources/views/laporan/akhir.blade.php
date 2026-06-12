@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Laporan Akhir Magang
</h2>

<a href="/laporan/akhir/pdf"
class="btn btn-danger mb-3">

Cetak PDF Laporan Akhir

</a>

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr align="center">

<th>Tanggal</th>
<th>Judul</th>
<th>Deskripsi</th>
<th>Status</th>

</tr>

</thead>

<tbody>

@foreach($kegiatan as $item)

<tr>

<td>
{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
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

@endforeach

</tbody>

</table>

</div>

</div>

@endsection