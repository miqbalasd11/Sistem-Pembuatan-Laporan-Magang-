<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pencatatan Magang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body{
            background-color:#f8f9fa;
        }

        .navbar-brand{
            font-weight:bold;
        }

        /* =========================
           SIDEBAR DESKTOP
        ========================= */

.sidebar{
    position:fixed;
    top:56px;
    left:0;
    width:16.666667%;
    height:calc(100vh - 56px);

    overflow-y:auto;

    background:#ffffff;
    border-right:1px solid #e9ecef;
    padding:10px;
    z-index:1000;
}

.sidebar-title{
    font-size:20px;
    font-weight:700;
    color:#212529;
    margin-bottom:12px;
}

.sidebar-section{
    font-size:16px;
    font-weight:700;
    color:#212529;
    margin-top:10px;
    margin-bottom:10px;
    padding:0 15px;
    text-transform:uppercase;
    border-bottom:1px solid #e9ecef;
    padding-bottom:8px;
}

.sidebar .nav-link{
    color:#495057;
    padding:12px 15px;
    border-radius:12px;
    margin-bottom:5px;
    display:flex;
    align-items:center;
    gap:10px;
    transition:all .3s;
}

.sidebar .nav-link:hover{
    background:#f1f5ff;
    color:#0d6efd;
}

.sidebar .nav-link.active{
    background:#0d6efd;
    color:white;
    box-shadow:0 4px 12px rgba(13,110,253,.25);
}

.sidebar .nav-link i{
    font-size:18px;
}

        /* =========================
           CONTENT
        ========================= */

.content{
    padding:20px;
}

/* Desktop */
@media (min-width:768px){

    .content-wrapper{
        margin-left:16.666667%;
    }

}

        /* =========================
           MOBILE MENU
        ========================= */

.mobile-menu{
    display:none;
    background:#ffffff;
    border-bottom:1px solid #dee2e6;
    box-shadow:0 2px 8px rgba(0,0,0,.05);
    padding:10px;

    transition:transform .3s ease;
}

.mobile-menu-hidden{
    transform:translateY(-100%);
}

        .mobile-menu .nav-link{
            color:#495057;
            font-size:14px;
            font-weight:500;
            text-decoration:none;
            padding:8px 10px;
            transition:.3s;
        }

        .mobile-menu .nav-link:hover{
            color:#0d6efd;
        }

        .mobile-menu .nav-link.active{
            color:#0d6efd;
            border-bottom:2px solid #0d6efd;
            font-weight:600;
        }

        .dropdown-item.active{
            background:#0d6efd;
            color:#ffffff;
        }

        /* =========================
           RESPONSIVE
        ========================= */

@media (max-width: 767px){

    .sidebar{
        display:none;
    }

    .mobile-menu{
        display:block;
        position:sticky;
        top:50px;
        z-index:999;
    }

    .content{
        padding:15px;
    }

    .navbar-brand{
        font-size:16px;
    }

}

    </style>

</head>
<body>

<!-- HEADER -->
<nav class="navbar navbar-dark bg-primary sticky-top">

    <div class="container-fluid">

        <span class="navbar-brand mb-0">
            Sistem Pencatatan Magang
        </span>

    </div>

</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu">

    <div class="d-flex justify-content-around align-items-center">

        <a href="/"
           class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="/profil"
           class="nav-link {{ request()->is('profil') ? 'active' : '' }}">
            Profil
        </a>

        <a href="/kegiatan"
           class="nav-link {{ request()->is('kegiatan*') ? 'active' : '' }}">
            Kegiatan
        </a>

        <div class="dropdown">

            <a class="nav-link dropdown-toggle {{ request()->is('laporan*') ? 'active' : '' }}"
               href="#"
               role="button"
               data-bs-toggle="dropdown">
                Laporan
            </a>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a class="dropdown-item {{ request()->is('laporan/harian') ? 'active' : '' }}"
                       href="/laporan/harian">
                        Laporan Harian
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ request()->is('laporan/mingguan') ? 'active' : '' }}"
                       href="/laporan/mingguan">
                        Laporan Mingguan
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ request()->is('laporan/bulanan') ? 'active' : '' }}"
                       href="/laporan/bulanan">
                        Laporan Bulanan
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ request()->is('laporan/akhir') ? 'active' : '' }}"
                       href="/laporan/akhir">
                        Laporan Akhir
                    </a>
                </li>

            </ul>

        </div>

    </div>

</div>

<div class="container-fluid">

    <div class="row">

        <!-- SIDEBAR DESKTOP -->
<div class="col-md-2 sidebar d-none d-md-block">


    <div class="sidebar-section">
        MENU UTAMA
    </div>

    <ul class="nav flex-column">

        <li>
            <a href="/"
               class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="/profil"
               class="nav-link {{ request()->is('profil') ? 'active' : '' }}">
                <i class="bi bi-person"></i>
                Profil Magang
            </a>
        </li>

        <li>
            <a href="/kegiatan"
               class="nav-link {{ request()->is('kegiatan*') ? 'active' : '' }}">
                <i class="bi bi-journal-check"></i>
                Kegiatan Magang
            </a>
        </li>

    </ul>

    <div class="sidebar-section">
        LAPORAN
    </div>

    <ul class="nav flex-column">

        <li>
            <a href="/laporan/harian"
               class="nav-link {{ request()->is('laporan/harian') ? 'active' : '' }}">
                <i class="bi bi-calendar-day"></i>
                Harian
            </a>
        </li>

        <li>
            <a href="/laporan/mingguan"
               class="nav-link {{ request()->is('laporan/mingguan') ? 'active' : '' }}">
                <i class="bi bi-calendar-week"></i>
                Mingguan
            </a>
        </li>

        <li>
            <a href="/laporan/bulanan"
               class="nav-link {{ request()->is('laporan/bulanan') ? 'active' : '' }}">
                <i class="bi bi-calendar-month"></i>
                Bulanan
            </a>
        </li>

        <li>
            <a href="/laporan/akhir"
               class="nav-link {{ request()->is('laporan/akhir') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                Laporan Akhir
            </a>
        </li>

    </ul>

</div>

        <!-- CONTENT -->
        <div class="col-md-10 col-12 content-wrapper">

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

<footer class="text-center py-3 text-muted">
    © {{ date('Y') }} Sistem Pencatatan Magang
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>

let lastScrollTop = 0;

const mobileMenu =
    document.querySelector('.mobile-menu');

window.addEventListener('scroll', function(){

    if(window.innerWidth > 767) return;

    let currentScroll =
        window.pageYOffset ||
        document.documentElement.scrollTop;

    if(currentScroll > lastScrollTop && currentScroll > 100){

        // scroll ke bawah
        mobileMenu.classList.add('mobile-menu-hidden');

    }else{

        // scroll ke atas
        mobileMenu.classList.remove('mobile-menu-hidden');

    }

    lastScrollTop =
        currentScroll <= 0
            ? 0
            : currentScroll;

});

</script>

</body>
</html>