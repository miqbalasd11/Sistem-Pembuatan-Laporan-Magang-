@extends('layouts.app')

@section('content')

<style>
.edit-header{
    margin-bottom:25px;
}

.edit-title{
    font-size:30px;
    font-weight:700;
    color:#1f2937;
    margin-bottom:5px;
}

.edit-subtitle{
    color:#6b7280;
    font-size:14px;
}

.edit-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.edit-card .card-body{
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

.form-control{
    border-radius:10px;
    padding:12px 15px;
    border:1px solid #d1d5db;
}

.form-control:focus{
    box-shadow:none;
    border-color:#0d6efd;
}

.btn-save{
    border-radius:10px;
    padding:12px 25px;
    font-weight:600;
}

.btn-back{
    border-radius:10px;
    padding:12px 25px;
}

@media(max-width:768px){

    .edit-title{
        font-size:24px;
    }

    .edit-card .card-body{
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

    <div class="edit-header">

        <h2 class="edit-title">
            Edit Profil Magang
        </h2>

        <p class="edit-subtitle">
            Perbarui informasi profil magang Anda
        </p>

    </div>

    <div class="card edit-card shadow-sm">

        <div class="card-body">

            <form action="/profil/update" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- Data Mahasiswa -->

                    <div class="col-lg-6">

                        <div class="form-section">

                            <div class="section-title">
                                Data Mahasiswa
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Nama Mahasiswa
                                </label>
                                <input
                                    type="text"
                                    name="nama_mahasiswa"
                                    class="form-control"
                                    value="{{ $profil->nama_mahasiswa }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    NIM
                                </label>
                                <input
                                    type="text"
                                    name="nim"
                                    class="form-control"
                                    value="{{ $profil->nim }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Program Studi
                                </label>
                                <input
                                    type="text"
                                    name="program_studi"
                                    class="form-control"
                                    value="{{ $profil->program_studi }}"
                                    required>
                            </div>

                            <div class="mb-0">
                                <label class="form-label">
                                    Universitas
                                </label>
                                <input
                                    type="text"
                                    name="universitas"
                                    class="form-control"
                                    value="{{ $profil->universitas }}"
                                    required>
                            </div>

                        </div>

                    </div>

                    <!-- Data Magang -->

                    <div class="col-lg-6">

                        <div class="form-section">

                            <div class="section-title">
                                Data Magang
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Perusahaan
                                </label>
                                <input
                                    type="text"
                                    name="perusahaan"
                                    class="form-control"
                                    value="{{ $profil->perusahaan }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Pembimbing
                                </label>
                                <input
                                    type="text"
                                    name="pembimbing"
                                    class="form-control"
                                    value="{{ $profil->pembimbing }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Tanggal Mulai
                                </label>
                                <input
                                    type="date"
                                    name="tanggal_mulai"
                                    class="form-control"
                                    value="{{ $profil->tanggal_mulai }}"
                                    required>
                            </div>

                            <div class="mb-0">
                                <label class="form-label">
                                    Tanggal Selesai
                                </label>
                                <input
                                    type="date"
                                    name="tanggal_selesai"
                                    class="form-control"
                                    value="{{ $profil->tanggal_selesai }}"
                                    required>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Deskripsi -->

                <div class="form-section mt-4">

                    <div class="section-title">
                        Deskripsi Magang
                    </div>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="6"
                        required>{{ $profil->deskripsi }}</textarea>

                </div>

                <!-- Tombol -->

                <div class="mt-4 d-flex flex-wrap gap-2">

                    <button
                        type="submit"
                        class="btn btn-success btn-save">

                        Simpan Perubahan

                    </button>

                    <a href="/profil"
                       class="btn btn-secondary btn-back">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection