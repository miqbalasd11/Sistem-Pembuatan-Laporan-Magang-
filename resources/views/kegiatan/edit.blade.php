@extends('layouts.app')

@section('content')

<h2>Edit Kegiatan Magang</h2>

<div class="card">
    <div class="card-body">

        <form action="/kegiatan/{{ $kegiatan->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ $kegiatan->tanggal->format('Y-m-d') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Jam Mulai
                </label>

                <input
                    type="time"
                    name="jam_mulai"
                    class="form-control"
                    value="{{ $kegiatan->jam_mulai }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Jam Selesai
                </label>

                <input
                    type="time"
                    name="jam_selesai"
                    class="form-control"
                    value="{{ $kegiatan->jam_selesai }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Judul Kegiatan
                </label>

                <input
                    type="text"
                    name="judul_kegiatan"
                    class="form-control"
                    value="{{ $kegiatan->judul_kegiatan }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Deskripsi Kegiatan
                </label>

                <textarea
                    name="deskripsi_kegiatan"
                    class="form-control"
                    rows="5"
                    required>{{ $kegiatan->deskripsi_kegiatan }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select"
                    required>

                    <option value="Belum Selesai"
                        {{ $kegiatan->status == 'Belum Selesai' ? 'selected' : '' }}>
                        Belum Selesai
                    </option>

                    <option value="Sedang Dikerjakan"
                        {{ $kegiatan->status == 'Sedang Dikerjakan' ? 'selected' : '' }}>
                        Sedang Dikerjakan
                    </option>

                    <option value="Selesai"
                        {{ $kegiatan->status == 'Selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>

                </select>
            </div>

            <button
                type="submit"
                class="btn btn-success">

                Update

            </button>

            <a href="/kegiatan"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>
</div>

@endsection