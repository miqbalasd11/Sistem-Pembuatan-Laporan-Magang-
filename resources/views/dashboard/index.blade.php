@extends('layouts.app')

@section('content')

<style>
.dashboard-header{
    margin-bottom:30px;
}

.dashboard-title{
    font-weight:700;
    color:#1f2937;
    margin-bottom:5px;
}

.dashboard-subtitle{
    color:#6b7280;
    font-size:14px;
}

.stat-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-4px);
}

.stat-card .card-body{
    padding:25px;
}

.stat-card h5{
    font-size:14px;
    font-weight:500;
    opacity:.9;
}

.stat-card h2{
    font-size:32px;
    font-weight:700;
    margin-top:10px;
}

.custom-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
}

.custom-card .card-header{
    border:none;
    padding:16px 20px;
    font-weight:600;
}

.table th{
    font-weight:600;
    background:#f8fafc;
}

.profile-table th{
    color:#374151;
    font-weight:600;
}

.profile-table td{
    color:#6b7280;
}

.badge{
    padding:8px 12px;
    border-radius:8px;
    font-size:12px;
}

@media (max-width:768px){

    .dashboard-title{
        font-size:24px;
    }

    .stat-card .card-body{
        padding:18px;
    }

    .stat-card h2{
        font-size:24px;
    }

    .stat-card h5{
        font-size:12px;
    }

    .custom-card .card-header{
        font-size:14px;
    }

    .table{
        font-size:13px;
    }

    .profile-table th{
        width:120px !important;
    }
}
</style>

<div class="container-fluid">

    <!-- Header -->

    <div class="dashboard-header">

        <h2 class="dashboard-title">
            Dashboard Magang
        </h2>

        <p class="dashboard-subtitle">
            Selamat datang di Sistem Pencatatan Kegiatan Magang
        </p>

    </div>

    <!-- Statistik -->

    <div class="row g-3 mb-4">

        <div class="col-6 col-md-3">

            <div class="card stat-card bg-primary text-white shadow-sm">

                <div class="card-body">

                    <h5>Total Kegiatan</h5>

                    <h2>{{ $totalKegiatan }}</h2>

                </div>

            </div>

        </div>

        <div class="col-6 col-md-3">

            <div class="card stat-card bg-success text-white shadow-sm">

                <div class="card-body">

                    <h5>Total Hari</h5>

                    <h2>{{ $totalHariMagang }}</h2>

                </div>

            </div>

        </div>

        <div class="col-6 col-md-3">

            <div class="card stat-card bg-info text-white shadow-sm">

                <div class="card-body">

                    <h5>Selesai</h5>

                    <h2>{{ $totalSelesai }}</h2>

                </div>

            </div>

        </div>

        <div class="col-6 col-md-3">

            <div class="card stat-card bg-warning text-white shadow-sm">

                <div class="card-body">

                    <h5>Pending</h5>

                    <h2>{{ $totalPending }}</h2>

                </div>

            </div>

        </div>

    </div>

    <!-- Profil -->

    <div class="card custom-card shadow-sm mb-4">

        <div class="card-header bg-dark text-white">

            Profil Magang

        </div>

        <div class="card-body">

            @if($profil)

            <div class="row">

                <div class="col-lg-6">

                    <table class="table profile-table">

                        <tr>
                            <th width="180">Nama</th>
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
                            <th width="180">Perusahaan</th>
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

            <h6 class="fw-bold">
                Deskripsi Magang
            </h6>

            <p class="text-muted mb-0">
                {{ $profil->deskripsi }}
            </p>

            @else

            <div class="alert alert-warning d-flex justify-content-between align-items-center">

                <span>
                    Profil magang belum diisi
                </span>

                <a href="/profil/create"
                   class="btn btn-primary btn-sm">

                    Isi Profil
                </a>

            </div>

            @endif

        </div>

    </div>

    <!-- Kegiatan Terbaru -->

    <div class="card custom-card shadow-sm">

        <div class="card-header bg-primary text-white">

            Kegiatan Terbaru

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

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

                            <td>{{ $loop->iteration }}</td>

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

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center text-muted py-4">

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

@endsection