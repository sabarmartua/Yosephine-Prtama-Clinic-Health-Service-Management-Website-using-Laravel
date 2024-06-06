<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Klinik Yosephine - Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
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
                        <li class="submenu active">
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
                        <li>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Kategori Artikel</h4>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('kategori_artikel.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis nama kategori di sini..">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Kategori Artikel</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($kategoriArtikels as $kategoriArtikel)
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $kategoriArtikel->nama }}</h5>
                                                <form action="{{ route('kategori_artikel.destroy', $kategoriArtikel->id) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('kategori_artikel.edit', $kategoriArtikel->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/Chart.bundle.js')}}"></script>
    <script src="{{ asset('admin/assets/js/chart.js')}}"></script>
    <script src="{{ asset('admin/assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent form from submitting immediately
                    var form = this.closest('form'); // Get the form associated with the button
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan bisa mengembalikan data ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // If confirmed, submit the form
                        }
                    })
                });
            });
        });
    </script>

</body>

</html>