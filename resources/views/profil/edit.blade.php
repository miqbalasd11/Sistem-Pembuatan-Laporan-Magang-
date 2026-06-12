@extends('layouts.app')

@section('content')

<h2>Edit Profil Magang</h2>

<form action="/profil/update"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Nama Mahasiswa</label>

        <input
            type="text"
            name="nama_mahasiswa"
            class="form-control"
            value="{{ $profil->nama_mahasiswa }}"
        >

    </div>

    <div class="mb-3">

        <label>NIM</label>

        <input
            type="text"
            name="nim"
            class="form-control"
            value="{{ $profil->nim }}"
        >

    </div>

    <div class="mb-3">

        <label>Program Studi</label>

        <input
            type="text"
            name="program_studi"
            class="form-control"
            value="{{ $profil->program_studi }}"
        >

    </div>

    <div class="mb-3">

        <label>Universitas</label>

        <input
            type="text"
            name="universitas"
            class="form-control"
            value="{{ $profil->universitas }}"
        >

    </div>

    <div class="mb-3">

        <label>Perusahaan</label>

        <input
            type="text"
            name="perusahaan"
            class="form-control"
            value="{{ $profil->perusahaan }}"
        >

    </div>

    <div class="mb-3">

        <label>Pembimbing</label>

        <input
            type="text"
            name="pembimbing"
            class="form-control"
            value="{{ $profil->pembimbing }}"
        >

    </div>

    <div class="mb-3">

        <label>Tanggal Mulai</label>

        <input
            type="date"
            name="tanggal_mulai"
            class="form-control"
            value="{{ $profil->tanggal_mulai }}"
        >

    </div>

    <div class="mb-3">

        <label>Tanggal Selesai</label>

        <input
            type="date"
            name="tanggal_selesai"
            class="form-control"
            value="{{ $profil->tanggal_selesai }}"
        >

    </div>

    <div class="mb-3">

        <label>Deskripsi</label>

        <textarea
            name="deskripsi"
            class="form-control"
            rows="5"
        >{{ $profil->deskripsi }}</textarea>

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Simpan Perubahan

    </button>

</form>

@endsection