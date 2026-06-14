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

.detail-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.detail-card .card-body{
    padding:30px;
}

.info-section{
    background:#f8fafc;
    border-radius:15px;
    padding:20px;
    height:100%;
}

.section-title{
    font-size:16px;
    font-weight:600;
    color:#111827;
    margin-bottom:20px;
}

.detail-item{
    margin-bottom:18px;
}

.detail-item:last-child{
    margin-bottom:0;
}

.detail-label{
    font-size:13px;
    color:#6b7280;
    margin-bottom:5px;
}

.detail-value{
    font-size:15px;
    font-weight:500;
    color:#111827;
}

.deskripsi-box{
    background:#f8fafc;
    border-radius:15px;
    padding:20px;
    margin-top:20px;
}

.badge-status{
    padding:8px 14px;
    border-radius:10px;
    font-size:13px;
}

.btn-back{
    border-radius:10px;
    padding:10px 20px;
}

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .detail-card .card-body{
        padding:20px;
    }

    .info-section{
        margin-bottom:15px;
    }

    .btn-back{
        width:100%;
    }
}
</style>

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header">

        <div>

            <h2 class="page-title">
                Detail Kegiatan
            </h2>

            <p class="page-subtitle">
                Informasi lengkap kegiatan magang
            </p>

        </div>

        <a href="/kegiatan"
           class="btn btn-secondary btn-back">

            Kembali

        </a>

    </div>

    <!-- Detail -->

    <div class="card detail-card shadow-sm">

        <div class="card-body">

            <div class="row g-4">

                <!-- Informasi Waktu -->

                <div class="col-lg-6">

                    <div class="info-section">

                        <div class="section-title">
                            Informasi Waktu
                        </div>

                        <div class="detail-item">

                            <div class="detail-label">
                                Tanggal
                            </div>

                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}
                            </div>

                        </div>

                        <div class="detail-item">

                            <div class="detail-label">
                                Jam Mulai
                            </div>

                            <div class="detail-value">
                                {{ date('H:i', strtotime($kegiatan->jam_mulai)) }}
                            </div>

                        </div>

                        <div class="detail-item">

                            <div class="detail-label">
                                Jam Selesai
                            </div>

                            <div class="detail-value">
                                {{ date('H:i', strtotime($kegiatan->jam_selesai)) }}
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Informasi Kegiatan -->

                <div class="col-lg-6">

                    <div class="info-section">

                        <div class="section-title">
                            Informasi Kegiatan
                        </div>

                        <div class="detail-item">

                            <div class="detail-label">
                                Judul Kegiatan
                            </div>

                            <div class="detail-value">
                                {{ $kegiatan->judul_kegiatan }}
                            </div>

                        </div>

                        <div class="detail-item">

                            <div class="detail-label">
                                Status
                            </div>

                            <div class="detail-value">

                                @if($kegiatan->status == 'Selesai')

                                    <span class="badge bg-success badge-status">
                                        Selesai
                                    </span>

                                @elseif($kegiatan->status == 'Sedang Dikerjakan')

                                    <span class="badge bg-primary badge-status">
                                        Sedang Dikerjakan
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark badge-status">
                                        Belum Selesai
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Deskripsi -->

            <div class="deskripsi-box">

                <div class="section-title">
                    Deskripsi Kegiatan
                </div>

                <p class="mb-0 text-muted">
                    {{ $kegiatan->deskripsi_kegiatan }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection