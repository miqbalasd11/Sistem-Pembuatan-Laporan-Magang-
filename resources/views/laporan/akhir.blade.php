@extends('layouts.app')

@section('content')

<style>
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:10px;
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

.table-modern th{
    background:#f8fafc;
    border:none;
    color:#374151;
    font-weight:600;
}

.table-modern td{
    vertical-align:top;
    border-color:#eef2f7;
}

.mobile-report{
    display:none;
}

.badge-status{
    padding:8px 12px;
    border-radius:10px;
    font-size:12px;
}

.summary-box{
    background:#f8fafc;
    border-radius:15px;
    padding:20px;
    margin-bottom:20px;
}

.summary-number{
    font-size:28px;
    font-weight:700;
    color:#0d6efd;
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

    .btn{
        width:100%;
    }
}
</style>

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header">

        <div>

            <h2 class="page-title">
                Laporan Akhir Magang
            </h2>

            <p class="page-subtitle">
                Rekapitulasi seluruh kegiatan selama masa magang
            </p>

        </div>

        <a href="/laporan/akhir/pdf"
           class="btn btn-danger">

            Cetak PDF Laporan Akhir

        </a>

    </div>

    <!-- Ringkasan -->

    <div class="summary-box">

        <div class="row text-center">

            <div class="col-md-4">

                <div class="summary-number">
                    {{ $kegiatan->count() }}
                </div>

                <div>
                    Total Kegiatan
                </div>

            </div>

            <div class="col-md-4">

                <div class="summary-number">
                    {{ $kegiatan->where('status','Selesai')->count() }}
                </div>

                <div>
                    Kegiatan Selesai
                </div>

            </div>

            <div class="col-md-4">

                <div class="summary-number">
                    {{ $kegiatan->where('status','!=','Selesai')->count() }}
                </div>

                <div>
                    Belum Selesai
                </div>

            </div>

        </div>

    </div>

    <!-- Desktop -->

    <div class="card custom-card shadow-sm desktop-table">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-modern">

                    <thead>

                        <tr>

                            <th width="170">
                                Tanggal
                            </th>

                            <th width="250">
                                Judul Kegiatan
                            </th>

                            <th>
                                Deskripsi
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

                                <strong>
                                    {{ $item->judul_kegiatan }}
                                </strong>

                            </td>

                            <td>

                                {{ $item->deskripsi_kegiatan }}

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

                                Belum ada data kegiatan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

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

            Belum ada data kegiatan magang.

        </div>

        @endforelse

    </div>

</div>

@endsection