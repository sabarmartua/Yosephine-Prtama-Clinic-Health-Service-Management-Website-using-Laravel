<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.ico') }}">
    <title>Detail Layanan - Klinik Yosephine</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
        .content {
            padding: 30px;
        }

        .header-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #4CAF50;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card img {
            border-radius: 5px;
        }

        .card-body h5 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .card-body p {
            font-size: 16px;
            color: #555;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
    <div class="header">
            <div class="header-left">
                <a href="index-2.html" class="logo">
                    <img src="{{ asset('assets/img/logo/logo.png')}}" width="35" height="35" alt=""> <span>Klinik Yosephine</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block"></li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('admin/assets/img/users.png')}}" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item" style="border: none; background: none; cursor: pointer;">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="{{ route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{route('pegawai.index')}}"><i class="fa fa-user-md"></i> <span>Pegawai</span></a>
                        </li>
                        <li>
                            <a href="{{ route('treatments.index')}}"><i class="fa fa-stethoscope"></i> <span>Manajemen Pengobatan</span></a>
                        </li>
                        <li>
                            <a href="{{ route('facilities.index')}}"><i class="fa fa-hospital-o"></i> <span>Fasilitas</span></a>
                        </li>
                        <li>
                            <a href="{{ route('antrian_online.show_today')}}"><i class="fa fa-wheelchair"></i> <span>Antrian</span></a>
                        </li>
                        <li>
                            <a href="{{ route('cuti_dokter.index')}}"><i class="fa fa-calendar-check-o"></i> <span>Cuti Dokter</span></a>
                        </li>
                        <li>
                            <a href="{{ route('obat.index')}}"><i class="fa fa-medkit"></i> <span>Manajemen Obat</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-list-alt"></i> <span> Artikel </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('kategori_artikel.index') }}"><i class="fa fa-list-alt"></i> Kategori Artikel</a></li>
                                <li><a href="{{ route('artikel.index')}}"><i class="fa fa-newspaper-o"></i> Artikel</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('posts.index')}}"><i class="fa fa-comments"></i> <span>Forum</span></a>
                        </li>
                        <li>
                            <a href="{{ route('faq.index')}}"><i class="fa fa-question-circle"></i> <span>FAQ</span></a>
                        </li>
                        <li>
                            <a href="{{ route('jadwals.index')}}"><i class="fa fa-hourglass-half"></i> <span>Jadwal</span></a>
                        </li>
                        <li class="active">
                            <a href="{{ route('services.index')}}"><i class="fa fa-stethoscope"></i> <span>Layanan</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.ulasan.index')}}"><i class="fa fa-star"></i> <span>Ulasan</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <div class="header-title">Detail Layanan</div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{ $service->title }}</h5>
                                @if ($service->image)
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="Gambar Layanan" class="img-fluid mt-3 mb-3">
                                </div>
                                @endif
                                <p>{{ $service->description }}</p>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali ke Daftar Layanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>