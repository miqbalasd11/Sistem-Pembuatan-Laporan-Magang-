@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-md-12">
            <h2>Dashboard Magang</h2>
            <p class="text-muted">
                Selamat datang di Sistem Pencatatan Kegiatan Magang
            </p>
        </div>

    </div>

    <!-- Statistik -->

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-primary shadow">

                <div class="card-body">

                    <h5>Total Kegiatan</h5>

                    <h2>
                        {{ $totalKegiatan }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-success shadow">

                <div class="card-body">

                    <h5>Total Hari Magang</h5>

                    <h2>
                        {{ $totalHariMagang }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-info shadow">

                <div class="card-body">

                    <h5>Kegiatan Selesai</h5>

                    <h2>
                        {{ $totalSelesai }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-warning shadow">

                <div class="card-body">

                    <h5>Kegiatan Pending</h5>

                    <h2>
                        {{ $totalPending }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- Profil Magang -->

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow mb-4">

                <div class="card-header bg-dark text-white">

                    Profil Magang

                </div>

                <div class="card-body">

                    @if($profil)

                        <div class="row">

                            <div class="col-md-6">

                                <table class="table">

                                    <tr>
                                        <th width="200">Nama</th>
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

                                </table>

                            </div>

                            <div class="col-md-6">

                                <table class="table">

                                    <tr>
                                        <th width="200">Perusahaan</th>
                                        <td>{{ $profil->perusahaan }}</td>
                                    </tr>

                                    <tr>
                                        <th>Pembimbing</th>
                                        <td>{{ $profil->pembimbing }}</td>
                                    </tr>

                                    <tr>
                                        <th>Tanggal Mulai</th>
                                        <td>
                                            {{ \Carbon\Carbon::parse($profil->tanggal_mulai)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Tanggal Selesai</th>
                                        <td>
                                            {{ \Carbon\Carbon::parse($profil->tanggal_selesai)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                        <hr>

                        <strong>Deskripsi Magang</strong>

                        <p class="mt-2">
                            {{ $profil->deskripsi }}
                        </p>

                    @else

                        <div class="alert alert-warning">

                            Profil magang belum diisi.

                            <a href="/profil/create"
                               class="btn btn-sm btn-primary ms-2">

                                Isi Profil

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

    <!-- Kegiatan Terbaru -->

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    Kegiatan Terbaru

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="60">No</th>
                                    <th>Tanggal</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Status</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($kegiatanTerbaru as $item)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </td>

                                    <td>
                                        {{ $item->judul_kegiatan }}
                                    </td>

                                    <td>

                                        @if($item->status == 'Selesai')

                                            <span class="badge bg-success">
                                                Selesai
                                            </span>

                                        @elseif($item->status == 'Proses')

                                            <span class="badge bg-primary">
                                                Proses
                                            </span>

                                        @else

                                            <span class="badge bg-warning">
                                                Pending
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center">

                                        Belum ada kegiatan magang

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection