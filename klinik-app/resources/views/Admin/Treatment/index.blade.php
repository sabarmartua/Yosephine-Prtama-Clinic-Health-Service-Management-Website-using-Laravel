<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.ico') }}">
    <title>Manajemen Pengobatan - Klinik Yosephine</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
        .table-container {
            margin: 20px 0;
            overflow-x: auto;
        }

        table th,
        table td {
            white-space: nowrap;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-export {
            margin-bottom: 15px;
        }

        .modal-content {
            padding: 20px;
        }

        .content h1 {
            margin-bottom: 20px;
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
                        <li class="active">
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
                <div class="container">
                    <h1>Daftar Pengobatan</h1>
                    <a href="{{ route('treatments.create') }}" class="btn btn-warning mb-3">+ Tambah</a>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <button type="button" class="btn btn-success btn-export" data-toggle="modal" data-target="#exportModal">
                        Export Excel
                    </button>

                    <!-- The Modal -->
                    <div class="modal fade" id="exportModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Export Excel</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ route('treatments.export') }}" method="GET">
                                        <div class="form-group">
                                            <label for="month">Pilih Bulan:</label>
                                            <input type="month" name="month" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Export</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="table-container">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>Usia</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Keluhan</th>
                                    <th>Jenis Pengobatan</th>
                                    <th>Tanggal Pengobatan</th>
                                    <th>Harga Perawatan</th>
                                    <th>Harga Obat</th>
                                    <th>Obat yang Digunakan</th>
                                    <th>Total Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($treatments as $treatment)
                                <tr>
                                    <td>{{ $treatment->nama_pasien }}</td>
                                    <td>{{ $treatment->usia }}</td>
                                    <td>{{ $treatment->alamat }}</td>
                                    <td>{{ $treatment->no_hp }}</td>
                                    <td>{{ $treatment->keluhan }}</td>
                                    <td>{{ $treatment->jenis_pengobatan }}</td>
                                    <td>{{ $treatment->tanggal_pengobatan }}</td>
                                    <td>Rp.{{ $treatment->harga_perawatan }}</td>
                                    <td>Rp.{{ $treatment->harga_obat }}</td>
                                    <td>
                                        @foreach($treatment->obats as $obat)
                                        {{ $obat->nama }} ({{ $obat->pivot->jumlah_obat }})<br>
                                        @endforeach
                                    </td>
                                    <td>Rp.{{ $treatment->harga_perawatan + $treatment->harga_obat }}.00</td>
                                    <td class="no-print">
                                        <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                        <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                        <a href="{{ route('treatments.print', $treatment->id) }}" class="btn btn-info btn-sm mb-1">Print</a>
                                        <a href="{{ route('treatments.pdf', $treatment->id) }}" class="btn btn-secondary btn-sm mb-1">PDF</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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