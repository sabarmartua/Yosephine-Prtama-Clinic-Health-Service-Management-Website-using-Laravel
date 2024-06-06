<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.ico') }}">
    <title>Manajemen Obat - Edit Data</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .card img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .truncate {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
                            <a href="{{ route('admin.dashboard')}}l"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('pegawai.index') }}"><i class="fa fa-user-md"></i> <span>Pegawai</span></a>
                        </li>
                        <li class="active">
                            <a href="{{ route('treatments.index') }}"><i class="fa fa-wheelchair"></i> <span>Manajemen Pengobatan</span></a>
                        </li>
                        <li>
                            <a href="{{ route('antrian_online.show_today') }}"><i class="fa fa-stethoscope"></i> <span>Antrian</span></a>
                        </li>
                        <li>
                            <a href="{{ route('cuti_dokter.index') }}"><i class="fa fa-calendar-check-o"></i> <span>Cuti Dokter</span></a>
                        </li>
                        <li>
                            <a href="{{ route('obat.index') }}"><i class="fa fa-medkit"></i> <span>Manajemen Obat</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user"></i> <span> Artikel </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('kategori_artikel.index') }}"><i class="fa fa-list-alt"></i> Kategori Artikel</a></li>
                                <li><a href="{{ route('artikel.index') }}"><i class="fa fa-newspaper-o"></i> Artikel</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html"><i class="fa fa-comments"></i> <span>Forum</span></a>
                        </li>
                        <li>
                            <a href="{{ route('faq.index') }}"><i class="fa fa-question-circle"></i> <span>FAQ</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Treatment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('treatments.update', $treatment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="obat_prices" value="{{ $obatPrices }}">

                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $treatment->nama_pasien }}" required>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia</label>
                                <input type="number" class="form-control" id="usia" name="usia" value="{{ $treatment->usia }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $treatment->alamat }}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $treatment->no_hp }}" required>
                            </div>
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <input type="text" class="form-control" id="keluhan" name="keluhan" value="{{ $treatment->keluhan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pengobatan">Jenis Pengobatan</label>
                                <input type="text" class="form-control" id="jenis_pengobatan" name="jenis_pengobatan" value="{{ $treatment->jenis_pengobatan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pengobatan">Tanggal Pengobatan</label>
                                <input type="date" class="form-control" id="tanggal_pengobatan" name="tanggal_pengobatan" value="{{ $treatment->tanggal_pengobatan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="harga_perawatan">Harga Perawatan</label>
                                <input type="number" class="form-control" id="harga_perawatan" name="harga_perawatan" value="{{ $treatment->harga_perawatan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="harga_obat">Harga Obat</label>
                                <input type="number" class="form-control" id="harga_obat" name="harga_obat" value="{{ $treatment->harga_obat }}" required readonly>
                            </div>

                            <div id="obat-container">
                                @foreach($treatment->obats as $treatmentObat)
                                <div class="form-group obat-item">
                                    <label for="obat">Obat</label>
                                    <select class="form-control obat-select" name="obat_id[]" required>
                                        <option value="">Pilih Obat</option>
                                        @foreach($obats as $obat)
                                        <option value="{{ $obat->id }}" {{ $treatmentObat->id == $obat->id ? 'selected' : '' }}>{{ $obat->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="jumlah_obat">Jumlah Obat</label>
                                    <input type="number" class="form-control" name="jumlah_obat[]" value="{{ $treatmentObat->pivot->jumlah_obat }}" required>
                                    <button type="button" class="btn btn-danger btn-remove-obat">Hapus</button>
                                </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-success mt-2" id="add-obat-button">Tambah Obat</button><br>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const obatPrices = JSON.parse(document.getElementById('obat_prices').value);

                            function calculateTotalObatPrice() {
                                let total = 0;
                                document.querySelectorAll('.obat-select').forEach((select, index) => {
                                    const obatId = select.value;
                                    const jumlah = document.querySelectorAll('input[name="jumlah_obat[]"]')[index].value;
                                    if (obatId && jumlah) {
                                        total += (obatPrices[obatId] * jumlah);
                                    }
                                });
                                document.getElementById('harga_obat').value = total.toFixed(2);
                            }

                            document.getElementById('add-obat-button').addEventListener('click', function() {
                                const container = document.getElementById('obat-container');
                                const obatInput = document.createElement('div');
                                obatInput.className = 'form-group obat-item';
                                obatInput.innerHTML = `
                <label for="obat">Obat</label>
                <select class="form-control obat-select" name="obat_id[]" required>
                    <option value="">Pilih Obat</option>
                    @foreach($obats as $obat)
                    <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                    @endforeach
                </select>
                <label for="jumlah_obat">Jumlah Obat</label>
                <input type="number" class="form-control" name="jumlah_obat[]" required>
                <button type="button" class="btn btn-danger btn-remove-obat">Hapus</button>
            `;
                                container.appendChild(obatInput);

                                obatInput.querySelector('.obat-select').addEventListener('change', calculateTotalObatPrice);
                                obatInput.querySelector('input[name="jumlah_obat[]"]').addEventListener('input', calculateTotalObatPrice);
                                obatInput.querySelector('.btn-remove-obat').addEventListener('click', function() {
                                    obatInput.remove();
                                    calculateTotalObatPrice();
                                });
                            });

                            document.querySelectorAll('.obat-select').forEach(select => {
                                select.addEventListener('change', calculateTotalObatPrice);
                            });
                            document.querySelectorAll('input[name="jumlah_obat[]"]').forEach(input => {
                                input.addEventListener('input', calculateTotalObatPrice);
                            });

                            calculateTotalObatPrice();
                        });
                    </script>

                    <div class="sidebar-overlay" data-reff=""></div>
                    <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js') }}"></script>
                    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
                    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
                    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
                    <script src="{{ asset('admin/assets/js/Chart.bundle.js') }}"></script>
                    <script src="{{ asset('admin/assets/js/chart.js') }}"></script>
                    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
                </div>
</body>

</html>