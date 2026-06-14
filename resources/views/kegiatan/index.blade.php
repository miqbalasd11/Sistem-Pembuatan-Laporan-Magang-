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
    margin:0;
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

.search-box{
    background:#f8fafc;
    padding:20px;
    border-radius:15px;
}

.table-modern th{
    background:#f8fafc;
    border:none;
    font-weight:600;
    color:#374151;
}

.table-modern td{
    vertical-align:middle;
    border-color:#eef2f7;
}

.badge-status{
    padding:8px 12px;
    border-radius:10px;
    font-size:12px;
}

.mobile-card{
    display:none;
}

.action-btn{
    margin:2px;
}

.pagination{
    justify-content:center;
}

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .desktop-table{
        display:none;
    }

    .mobile-card{
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
        margin-bottom:3px;
    }

    .mobile-value{
        font-weight:500;
        margin-bottom:10px;
    }

    .btn-mobile{
        width:100%;
        margin-bottom:5px;
    }
}
</style>

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header">

        <div>

            <h2 class="page-title">
                Data Kegiatan Magang
            </h2>

            <p class="page-subtitle">
                Kelola seluruh aktivitas dan kegiatan magang
            </p>

        </div>

        <a href="/kegiatan/create"
           class="btn btn-primary">

            + Tambah Kegiatan

        </a>

    </div>

    <!-- Filter -->

    <div class="card custom-card shadow-sm mb-4">

        <div class="card-body">

            <div class="search-box">

                <form method="GET">

                    <div class="row g-3">

                        <div class="col-md-5">

                            <input
                                type="text"
                                name="judul"
                                class="form-control"
                                placeholder="Cari judul kegiatan..."
                                value="{{ request('judul') }}"
                            >

                        </div>

                        <div class="col-md-4">

                            <input
                                type="date"
                                name="tanggal"
                                class="form-control"
                                value="{{ request('tanggal') }}"
                            >

                        </div>

                        <div class="col-md-3 d-grid">

                            <button
                                class="btn btn-success">

                                Cari Data

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Desktop Mode -->

    <div class="card custom-card shadow-sm desktop-table">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-modern">

                    <thead>

                        <tr>

                            <th width="70">No</th>
                            <th>Tanggal</th>
                            <th>Judul Kegiatan</th>
                            <th>Status</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kegiatan as $item)

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

                                    <span class="badge bg-success badge-status">
                                        Selesai
                                    </span>

                                @elseif($item->status == 'Proses')

                                    <span class="badge bg-primary badge-status">
                                        Proses
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark badge-status">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="/kegiatan/{{ $item->id }}"
                                   class="btn btn-info btn-sm action-btn">

                                    Detail

                                </a>

                                <a href="/kegiatan/{{ $item->id }}/edit"
                                   class="btn btn-warning btn-sm action-btn">

                                    Edit

                                </a>

                                <form
                                    action="/kegiatan/{{ $item->id }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus data ini?')"
                                        class="btn btn-danger btn-sm action-btn">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-4">

                                Belum ada data kegiatan

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Mobile Mode -->

    <div class="mobile-card">

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
                Status
            </div>

            <div class="mb-3">

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

            </div>

            <a href="/kegiatan/{{ $item->id }}"
               class="btn btn-info btn-mobile">

                Detail

            </a>

            <a href="/kegiatan/{{ $item->id }}/edit"
               class="btn btn-warning btn-mobile">

                Edit

            </a>

            <form
                action="/kegiatan/{{ $item->id }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Hapus data ini?')"
                    class="btn btn-danger btn-mobile">

                    Hapus

                </button>

            </form>

        </div>

        @empty

        <div class="alert alert-secondary">

            Belum ada data kegiatan.

        </div>

        @endforelse

    </div>

    <!-- Pagination -->

    <div class="mt-4">

        {{ $kegiatan->links() }}

    </div>

</div>

@endsection