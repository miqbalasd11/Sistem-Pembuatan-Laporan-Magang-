@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Laporan Bulanan
</h2>

<div class="card mb-4">

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-4">

<label>Bulan</label>

<input
type="month"
name="bulan"
class="form-control"
value="{{ request('bulan') }}">

</div>

<div class="col-md-4 mt-4">

<button
class="btn btn-primary">

Tampilkan

</button>

</div>

</div>

</form>

</div>

</div>

@if($bulan)

<a href="/laporan/bulanan/pdf?bulan={{ $bulan }}"
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