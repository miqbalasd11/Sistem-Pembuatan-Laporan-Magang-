@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Laporan Mingguan
</h2>

<div class="card mb-4">
<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-4">

<label>Tanggal Mulai</label>

<input
type="date"
name="mulai"
class="form-control"
value="{{ request('mulai') }}">

</div>

<div class="col-md-4">

<label>Tanggal Selesai</label>

<input
type="date"
name="selesai"
class="form-control"
value="{{ request('selesai') }}">

</div>

<div class="col-md-4 mt-4">

<button class="btn btn-primary">
Tampilkan
</button>

</div>

</div>

</form>

</div>
</div>

@if($mulai && $selesai)

<a href="/laporan/mingguan/pdf?mulai={{ $mulai }}&selesai={{ $selesai }}"
class="btn btn-danger mb-3">

Cetak PDF

</a>

<table class="table table-bordered">

<thead>

<tr align="center">
<th>Tanggal</th>
<th>Jam</th>
<th>Kegiatan</th>
<th>Status</th>
</tr>

</thead>

<tbody>

@foreach($kegiatan as $item)

<tr>

<td>
{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
</td>

<td align="center">
                        {{ date('H:i', strtotime($item->jam_mulai)) }}
                        -
                        {{ date('H:i', strtotime($item->jam_selesai)) }}
                    </td>

<td>

<strong>
{{ $item->judul_kegiatan }}
</strong>

<br>

{{ $item->deskripsi_kegiatan }}

</td>

<td>
{{ $item->status }}
</td>

</tr>

@endforeach

</tbody>

</table>

@endif

@endsection