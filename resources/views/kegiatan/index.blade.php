@extends('layouts.app')

@section('content')

<h2>Data Kegiatan Magang</h2>

<a href="/kegiatan/create"
   class="btn btn-primary mb-3">

    Tambah Kegiatan

</a>

<form method="GET"
      class="row mb-3">

    <div class="col-md-4">

        <input
            type="text"
            name="judul"
            class="form-control"
            placeholder="Cari Judul"
        >

    </div>

    <div class="col-md-4">

        <input
            type="date"
            name="tanggal"
            class="form-control"
        >

    </div>

    <div class="col-md-4">

        <button
            class="btn btn-success">

            Cari

        </button>

    </div>

</form>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>No</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>

    </thead>

    <tbody>

        @forelse($kegiatan as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>
                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
            </td>

            <td>{{ $item->judul_kegiatan }}</td>

            <td>{{ $item->status }}</td>

            <td>

                <a href="/kegiatan/{{ $item->id }}"
                   class="btn btn-info btn-sm">

                    Detail

                </a>

                <a href="/kegiatan/{{ $item->id }}/edit"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form
                    action="/kegiatan/{{ $item->id }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Hapus data?')"
                        class="btn btn-danger btn-sm">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="5"
                class="text-center">

                Belum ada data

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

{{ $kegiatan->links() }}

@endsection