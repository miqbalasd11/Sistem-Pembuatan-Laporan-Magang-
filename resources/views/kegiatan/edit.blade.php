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
    padding:30px;
}

.form-section{
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

.form-label{
    font-weight:500;
    color:#374151;
    margin-bottom:8px;
}

.form-control,
.form-select{
    border-radius:10px;
    padding:12px 15px;
    border:1px solid #d1d5db;
}

.form-control:focus,
.form-select:focus{
    border-color:#0d6efd;
    box-shadow:none;
}

.btn-save{
    border-radius:10px;
    padding:12px 24px;
    font-weight:600;
}

.btn-back{
    border-radius:10px;
    padding:12px 24px;
}

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .custom-card .card-body{
        padding:20px;
    }

    .form-section{
        margin-bottom:15px;
    }

    .btn-save,
    .btn-back{
        width:100%;
        margin-bottom:10px;
    }
}
</style>

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header">

        <h2 class="page-title">
            Edit Kegiatan Magang
        </h2>

        <p class="page-subtitle">
            Perbarui data kegiatan magang yang telah dibuat
        </p>

    </div>

    <!-- Form -->

    <div class="card custom-card shadow-sm">

        <div class="card-body">

            <form action="/kegiatan/{{ $kegiatan->id }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- Informasi Waktu -->

                    <div class="col-lg-6">

                        <div class="form-section">

                            <div class="section-title">
                                Informasi Waktu
                            </div>

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

                            <div class="mb-0">

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

                        </div>

                    </div>

                    <!-- Informasi Kegiatan -->

                    <div class="col-lg-6">

                        <div class="form-section">

                            <div class="section-title">
                                Informasi Kegiatan
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

                            <div class="mb-0">

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

                        </div>

                    </div>

                </div>

                <!-- Deskripsi -->

                <div class="form-section mt-4">

                    <div class="section-title">
                        Deskripsi Kegiatan
                    </div>

                    <textarea
                        name="deskripsi_kegiatan"
                        class="form-control"
                        rows="6"
                        required>{{ $kegiatan->deskripsi_kegiatan }}</textarea>

                </div>

                <!-- Tombol -->

                <div class="mt-4 d-flex flex-wrap gap-2">

                    <button
                        type="submit"
                        class="btn btn-success btn-save">

                        Update Kegiatan

                    </button>

                    <a href="/kegiatan"
                       class="btn btn-secondary btn-back">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection