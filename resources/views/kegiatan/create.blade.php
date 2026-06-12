@extends('layouts.app')

@section('content')

<h2>Tambah Kegiatan</h2>

<form action="/kegiatan"
      method="POST">

@csrf

<div class="mb-3">
    <label>Tanggal</label>
    <input type="date"
           name="tanggal"
           class="form-control">
</div>

<div class="mb-3">
    <label>Jam Mulai</label>
    <input type="time"
           name="jam_mulai"
           class="form-control">
</div>

<div class="mb-3">
    <label>Jam Selesai</label>
    <input type="time"
           name="jam_selesai"
           class="form-control">
</div>

<div class="mb-3">
    <label>Judul Kegiatan</label>
    <input type="text"
           name="judul_kegiatan"
           class="form-control">
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea
        name="deskripsi_kegiatan"
        class="form-control"
        rows="5"></textarea>
</div>

<div class="mb-3">

<label>Status</label>

<select
    name="status"
    class="form-control">

    <option>
        Belum Selesai
    </option>

    <option>
        Sedang Dikerjakan
    </option>

    <option>
        Selesai
    </option>

</select>

</div>

<button
    type="submit"
    class="btn btn-success">

    Simpan

</button>

</form>

@endsection