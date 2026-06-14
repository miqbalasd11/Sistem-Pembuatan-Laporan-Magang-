@extends('layouts.app')

@section('content')

<style>
.profile-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    flex-wrap:wrap;
    gap:10px;
}

.profile-title{
    font-size:30px;
    font-weight:700;
    color:#1f2937;
    margin:0;
}

.profile-subtitle{
    color:#6b7280;
    font-size:14px;
    margin-top:5px;
}

.profile-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.profile-card .card-body{
    padding:30px;
}

.profile-section{
    background:#f8fafc;
    border-radius:15px;
    padding:20px;
    height:100%;
}

.profile-section-title{
    font-size:16px;
    font-weight:600;
    color:#111827;
    margin-bottom:15px;
}

.profile-item{
    margin-bottom:15px;
}

.profile-item:last-child{
    margin-bottom:0;
}

.profile-label{
    font-size:13px;
    color:#6b7280;
    margin-bottom:4px;
}

.profile-value{
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

.btn-edit{
    border-radius:10px;
    padding:10px 20px;
    font-weight:500;
}

@media (max-width: 768px){

    .profile-title{
        font-size:24px;
    }

    .profile-card .card-body{
        padding:20px;
    }

    .profile-section{
        margin-bottom:15px;
    }

    .btn-edit{
        width:100%;
    }

    .profile-value{
        font-size:14px;
    }
}
</style>

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->

    <div class="profile-header">

        <div>
            <h2 class="profile-title">
                Profil Magang
            </h2>

            <p class="profile-subtitle">
                Informasi mahasiswa dan data tempat magang
            </p>
        </div>

        <a href="/profil/edit" class="btn btn-primary btn-edit">
            Edit Profil
        </a>

    </div>

    <!-- Card Profil -->

    <div class="card profile-card shadow-sm">

        <div class="card-body">

            <div class="row g-4">

                <!-- Data Mahasiswa -->

                <div class="col-lg-6">

                    <div class="profile-section">

                        <div class="profile-section-title">
                            Data Mahasiswa
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">Nama Mahasiswa</div>
                            <div class="profile-value">
                                {{ $profil->nama_mahasiswa }}
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">NIM</div>
                            <div class="profile-value">
                                {{ $profil->nim }}
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">Program Studi</div>
                            <div class="profile-value">
                                {{ $profil->program_studi }}
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">Universitas</div>
                            <div class="profile-value">
                                {{ $profil->universitas }}
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Data Magang -->

                <div class="col-lg-6">

                    <div class="profile-section">

                        <div class="profile-section-title">
                            Data Magang
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">Perusahaan</div>
                            <div class="profile-value">
                                {{ $profil->perusahaan }}
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">Pembimbing</div>
                            <div class="profile-value">
                                {{ $profil->pembimbing }}
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">Tanggal Mulai</div>
                            <div class="profile-value">
                                {{ \Carbon\Carbon::parse($profil->tanggal_mulai)->translatedFormat('d F Y') }}
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-label">Tanggal Selesai</div>
                            <div class="profile-value">
                                {{ \Carbon\Carbon::parse($profil->tanggal_selesai)->translatedFormat('d F Y') }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Deskripsi -->

            <div class="deskripsi-box">

                <div class="profile-section-title">
                    Deskripsi Magang
                </div>

                <p class="mb-0 text-muted">
                    {{ $profil->deskripsi }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection