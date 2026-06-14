@extends('layouts.app')

@section('content')

<style>
.page-header{
    margin-bottom:25px;
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:#1f2937;
    margin-bottom:5px;
}

.page-subtitle{
    color:#6b7280;
    font-size:14px;
}

.custom-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.custom-card .card-body{
    padding:25px;
}

.filter-box{
    background:#f8fafc;
    padding:20px;
    border-radius:15px;
}

.table-modern th{
    background:#f8fafc;
    border:none;
    color:#374151;
    font-weight:600;
}

.table-modern td{
    vertical-align:middle;
    border-color:#eef2f7;
}

.report-header{
    background:#f8fafc;
    padding:15px 20px;
    font-weight:600;
    color:#111827;
}

.mobile-report{
    display:none;
}

.badge-status{
    padding:8px 12px;
    border-radius:10px;
    font-size:12px;
}

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .desktop-table{
        display:none;
    }

    .mobile-report{
        display:block;
    }

    .mobile-item{
        background:#fff;
        border-radius:15px;
        padding:15px;
        margin-bottom:15px;
        box-shadow:0 2px 10px rgba(0,0,0,.05);
    }

    .mobile-label{
        font-size:12px;
        color:#6b7280;
        margin-bottom:4px;
    }

    .mobile-value{
        font-size:14px;
        font-weight:500;
        margin-bottom:12px;
    }

    .btn{
        width:100%;
    }
}
</style>

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header">

        <h2 class="page-title">
            Laporan Mingguan
        </h2>

        <p class="page-subtitle">
            Laporan kegiatan magang berdasarkan rentang tanggal
        </p>

    </div>

    <!-- Filter -->

    <div class="card custom-card shadow-sm mb-4">

        <div class="card-body">

            <div class="filter-box">

                <form method="GET">

                    <div class="row g-3 align-items-end">

                        <div class="col-md-4">

                            <label class="form-label">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                name="mulai"
                                class="form-control"
                                value="{{ request('mulai') }}">

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">
                                Tanggal Selesai
                            </label>

                            <input
                                type="date"
                                name="selesai"
                                class="form-control"
                                value="{{ request('selesai') }}">

                        </div>

                        <div class="col-md-4">

                            <button
                                class="btn btn-primary">

                                Tampilkan Laporan

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    @if($mulai && $selesai)

    <!-- Tombol PDF -->

    <div class="mb-4">

        <a href="/laporan/mingguan/pdf?mulai={{ $mulai }}&selesai={{ $selesai }}"
           class="btn btn-danger">

            Cetak PDF

        </a>

    </div>

    <!-- Hasil Laporan -->

    <div class="card custom-card shadow-sm">

        <div class="report-header">

            Periode :
            {{ \Carbon\Carbon::parse($mulai)->translatedFormat('d F Y') }}
            -
            {{ \Carbon\Carbon::parse($selesai)->translatedFormat('d F Y') }}

        </div>

        <div class="card-body">

            <!-- Desktop -->

            <div class="table-responsive desktop-table">

                <table class="table table-modern">

                    <thead>

                        <tr>

                            <th width="170">
                                Tanggal
                            </th>

                            <th width="150">
                                Jam
                            </th>

                            <th>
                                Kegiatan
                            </th>

                            <th width="150">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kegiatan as $item)

                        <tr>

                            <td>

                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                            </td>

                            <td>

                                {{ date('H:i', strtotime($item->jam_mulai)) }}
                                -
                                {{ date('H:i', strtotime($item->jam_selesai)) }}

                            </td>

                            <td>

                                <strong>
                                    {{ $item->judul_kegiatan }}
                                </strong>

                                <br>

                                <small class="text-muted">

                                    {{ $item->deskripsi_kegiatan }}

                                </small>

                            </td>

                            <td>

                                @if($item->status == 'Selesai')

                                    <span class="badge bg-success badge-status">
                                        Selesai
                                    </span>

                                @elseif($item->status == 'Sedang Dikerjakan')

                                    <span class="badge bg-primary badge-status">
                                        Sedang Dikerjakan
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark badge-status">
                                        Belum Selesai
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center py-4">

                                Tidak ada kegiatan pada periode ini

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Mobile -->

            <div class="mobile-report">

                @forelse($kegiatan as $item)

                <div class="mobile-item">

                    <div class="mobile-label">
                        Tanggal
                    </div>

                    <div class="mobile-value">

                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                    </div>

                    <div class="mobile-label">
                        Waktu
                    </div>

                    <div class="mobile-value">

                        {{ date('H:i', strtotime($item->jam_mulai)) }}
                        -
                        {{ date('H:i', strtotime($item->jam_selesai)) }}

                    </div>

                    <div class="mobile-label">
                        Judul Kegiatan
                    </div>

                    <div class="mobile-value">

                        {{ $item->judul_kegiatan }}

                    </div>

                    <div class="mobile-label">
                        Deskripsi
                    </div>

                    <div class="mobile-value">

                        {{ $item->deskripsi_kegiatan }}

                    </div>

                    <div class="mobile-label">
                        Status
                    </div>

                    <div>

                        @if($item->status == 'Selesai')

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        @elseif($item->status == 'Sedang Dikerjakan')

                            <span class="badge bg-primary">
                                Sedang Dikerjakan
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                Belum Selesai
                            </span>

                        @endif

                    </div>

                </div>

                @empty

                <div class="alert alert-secondary">

                    Tidak ada kegiatan pada periode ini.

                </div>

                @endforelse

            </div>

        </div>

    </div>

    @endif

</div>

@endsection