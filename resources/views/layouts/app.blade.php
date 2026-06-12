<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pencatatan Magang</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body{
            background-color:#f8f9fa;
        }

        .sidebar{
            min-height:100vh;
            background:#212529;
        }

        .sidebar .nav-link{
            color:#ffffff;
            padding:12px 15px;
        }

        .sidebar .nav-link:hover{
            background:#343a40;
            border-radius:6px;
        }

        .sidebar .nav-link.active{
            background:#0d6efd;
            border-radius:6px;
        }

        .content{
            padding:20px;
        }

        .navbar-brand{
            font-weight:bold;
        }

        .card-dashboard{
            border:none;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container-fluid">

        <a class="navbar-brand" href="/">
            Sistem Pencatatan Magang
        </a>

    </div>

</nav>

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">


            <ul class="nav flex-column">
                <h6 class="text-white">
                    MENU UTAMA
                </h6>

                <li class="nav-item">
                    <a href="/"
                       class="nav-link">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/profil"
                       class="nav-link">
                        <i class="bi bi-person-circle"></i>
                        Profil Magang
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/kegiatan"
                       class="nav-link">
                        <i class="bi bi-journal-text"></i>
                        Kegiatan Magang
                    </a>
                </li>

                <hr class="text-white">

                <h6 class="text-white">
                    LAPORAN
                </h6>

                <li class="nav-item">
                    <a href="/laporan/harian"
                       class="nav-link">
                        <i class="bi bi-calendar-day"></i>
                        Laporan Harian
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/laporan/mingguan"
                       class="nav-link">
                        <i class="bi bi-calendar-week"></i>
                        Laporan Mingguan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/laporan/bulanan"
                       class="nav-link">
                        <i class="bi bi-calendar-month"></i>
                        Laporan Bulanan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/laporan/akhir"
                       class="nav-link">
                        <i class="bi bi-file-earmark-text"></i>
                        Laporan Akhir
                    </a>
                </li>

            </ul>

        </div>

        <!-- Content -->
        <div class="col-md-10">

            <div class="content">

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif

                @yield('content')

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>