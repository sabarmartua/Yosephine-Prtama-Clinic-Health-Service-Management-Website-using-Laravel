<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <li class="nav-item dropdown d-none d-sm-block">
                    
                </li>
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
                        <li class="menu-title"> </li>
                        <li class="active">
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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-wheelchair" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $count }}</h3>
                                <span class="widget-title1">Antrian Hari Ini<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-calendar-check-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$leaves}}</h3>
                                <span class="widget-title2">Cuti Dokter <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$pegawaiCount}}</h3>
                                <span class="widget-title3">Pegawai <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$artikelCount}}</h3>
                                <span class="widget-title4">Artikel<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add your chart here -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Pasien Berobat Bulanan</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="visitorsChart" width="300" height="60" style="max-width:100%; width: 300px;"></canvas>
                                <p style="text-align: center;">Bulan ( Januari - Desember)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grafik Keuangan</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="costChart" width="300" height="60" style="max-width:100%; width: 300px;"></canvas>
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Visitors Chart Data
        var ctxVisitors = document.getElementById('visitorsChart').getContext('2d');
        var visitorsData = {
            labels: <?php echo json_encode(range(1, 12)); ?>, // Assuming labels are 1 to 12 for months
            datasets: [{
                label: 'Visitors',
                data: <?php echo json_encode($chartData); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var visitorsOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var visitorsChart = new Chart(ctxVisitors, {
            type: 'line',
            data: visitorsData,
            options: visitorsOptions
        });

        // Cost Chart Data
        var ctxCost = document.getElementById('costChart').getContext('2d');
        var costData = {
            labels: <?php echo json_encode(range(1, 12)); ?>, // Assuming labels are 1 to 12 for months
            datasets: [{
                label: 'Medication Cost',
                data: <?php echo json_encode($medicationCostChartData); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },{
                label: 'Treatment Cost',
                data: <?php echo json_encode($treatmentCostChartData); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var costOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var costChart = new Chart(ctxCost, {
            type: 'line',
            data: costData,
            options: costOptions
        });
    });
</script>

</body>

</html>
