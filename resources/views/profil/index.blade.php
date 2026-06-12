@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Profil Magang
</h2>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card">

    <div class="card-body">

        <table class="table">

            <tr>
                <th>Nama Mahasiswa</th>
                <td>{{ $profil->nama_mahasiswa }}</td>
            </tr>

            <tr>
                <th>NIM</th>
                <td>{{ $profil->nim }}</td>
            </tr>

            <tr>
                <th>Program Studi</th>
                <td>{{ $profil->program_studi }}</td>
            </tr>

            <tr>
                <th>Universitas</th>
                <td>{{ $profil->universitas }}</td>
            </tr>

            <tr>
                <th>Perusahaan</th>
                <td>{{ $profil->perusahaan }}</td>
            </tr>

            <tr>
                <th>Pembimbing</th>
                <td>{{ $profil->pembimbing }}</td>
            </tr>

            <tr>
                <th>Tanggal Mulai</th>
                <td>{{ \Carbon\Carbon::parse($profil->tanggal_mulai)->translatedFormat('d F Y') }}</td>
            </tr>

            <tr>
                <th>Tanggal Selesai</th>
                <td>{{ \Carbon\Carbon::parse($profil->tanggal_selesai)->translatedFormat('d F Y') }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $profil->deskripsi }}</td>
            </tr>

        </table>

        <a href="/profil/edit"
           class="btn btn-primary">

            Edit Profil

        </a>

    </div>

</div>

@endsection