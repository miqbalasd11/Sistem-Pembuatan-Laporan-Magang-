@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Laporan Harian
</h2>

<div class="card mb-4">
    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-4">

                    <label>Tanggal</label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ request('tanggal') }}">

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

@if($tanggal)

<div class="mb-3">

    <a href="/laporan/harian/pdf?tanggal={{ $tanggal }}"
       class="btn btn-danger">

        Cetak PDF

    </a>

</div>

<div class="card">

    <div class="card-header">

        Tanggal:
        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr align="center">
                    <th>No</th>
                    <th>Jam</th>
                    <th>Kegiatan</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @forelse($kegiatan as $item)

                <tr>

                    <td align="center">{{ $loop->iteration }}</td>

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

                @empty

                <tr>

                    <td colspan="4"
                        class="text-center">

                        Tidak ada kegiatan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endif

@endsection