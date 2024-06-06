<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Yosephine Pratama </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .areanya-slide {
            padding: 0 60px;
            /* Adjust this value to set the desired margin */
        }

        .slider-active {
            background: none !important;
            /* Ensure no background is applied */
        }

        .single-slider {
            position: relative;
        }

        .slider-img img {
            display: block;
            width: 100%;
            height: auto;
        }
        .footer-area {
            background-image: url('assets/img/gallery/footer_bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 20px 0;
            /* Reduced padding */
        }

        .footer-top {
            padding: 30px 0;
            /* Reduced padding */
        }

        .single-footer-caption {
            margin-bottom: 20px;
            /* Reduced margin */
        }

        .footer-logo img {
            max-width: 200px;
            /* Reduced logo size */
        }

        .footer-tittle h4 {
            font-size: 16px;
            /* Adjusted font size */
            margin-bottom: 15px;
            /* Reduced margin */
        }

        .footer-tittle ul li {
            margin-bottom: 10px;
            /* Reduced margin */
            font-size: 14px;
            /* Adjusted font size */
        }

        .footer-tittle ul li a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer-tittle ul li a:hover {
            color: #007bff;
        }

        .footer-social a {
            margin-right: 10px;
            font-size: 16px;
            /* Adjusted icon size */
        }

        .footer-copy-right p {
            margin: 0;
            font-size: 14px;
            /* Adjusted font size */
            color: #ffffff;
        }

        .footer-copy-right {
            padding: 10px 0;
            /* Reduced padding */
        }

        .footer-copy-right.f-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('assets/img/logo/loder.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ route('pasien.dashboard')}}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="" style="max-width: 300px; max-height: 150px;"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('pasien.dashboard')}}">Beranda</a></li>
                                            <li><a href="{{ route('antrian_online.index')}}">Antrian</a></li>
                                            <li><a href="{{ route('patient.artikel.index')}}">Artikel</a></li>
                                            <li><a href="{{ route('user.obat.index')}}">Obat</a></li>
                                            <li><a href="{{ route('leave_dates') }}">Cuti Dokter</a></li>
                                            <li><a href="{{ route('ulasan.index')}}">Ulasan</a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('ulasan.index')}}">Lihat Ulasan</a></li>
                                                    <li><a href="{{ route('ulasan.create')}}">Buat Ulasan</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('posts.index')}}">Forum</a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('posts.index')}}">Lihat Forum</a></li>
                                                    <li><a href="{{ route('posts.create')}}">Buat Forum</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('pegawai.show')}}">Jadwal & Pegawai</a></li>
                                            <li><a href="#">Tentang Klinik</a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('pasien.facilities.index')}}">Fasilitas</a></li>
                                                    <li><a href="{{ route('pasien.services.index')}}">Layanan</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    @auth
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn header-btn">Logout</button>
                                    </form>
                                    @endauth
                                    @guest
                                    <div class="login-btn ml-20">
                                        <a href="{{ route('loginForm')}}" class="btn header-btn">Login</a>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <div class="areanya-slide">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height">
                    <div class="slider-img">
                        <img src="{{ asset('assets/img/logo/yosephineKlinik.jpg') }}" alt="Slider Image 1" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!--? Team Start -->
        <div class="team-area section-padding30">
            <div class="container">
                <!-- Section Title -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-tittle text-center mb-100">
                            <span>Meet with us</span>
                            <h2>Pegawai Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($pegawais as $pegawai)
                    <!-- Single Team Member -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img style="width: 100%; height: 400px; padding: 10px" src="{{ asset('storage/' . $pegawai->gambar) }}" alt="{{ $pegawai->nama }}">
                            </div>
                            <div class="team-caption">
                                <h3><a href="#">{{ $pegawai->nama }}</a></h3>
                                <span>{{ $pegawai->profesi }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Team End -->
        <!-- Jadwal-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Kami selalu siap</span>
                        <h2>Jadwal Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($jadwals as $jadwal)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/' . $jadwal->pegawai->gambar) }}" class="rounded-circle mb-3" alt="{{ $jadwal->pegawai->nama }}" style="width: 100px; height: 100px;">
                            <h3 class="card-title">{{ $jadwal->pegawai->nama }}</h3>
                            <p class="card-text">{{ $jadwal->pegawai->profesi }}</p>
                            <p>
                                @foreach($jadwal->jadwal as $detail)
                                {{ $detail['hari'] }} ({{ $detail['jam_mulai'] }} - {{ $detail['jam_selesai'] }}) WIB<br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div><br><br>
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/footer_bg.jpg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p style="color: #ffffff;">Klinik kami adalah salah satu klinik Terbaik di Porsea</p>
                                        </div>
                                    </div>
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-globe"></i></a>
                                        <a href="#"><i class="fab fa-behance"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>New Products</h4>
                                    <ul>
                                        <li><a href="#">Antrian</a></li>
                                        <li><a href="#">Artikel</a></li>
                                        <li><a href="#"> Ulasan</a></li>
                                        <li><a href="#"> Tanggal Cuti Dokter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Support</h4>
                                    <ul>
                                        <li><a href="#">Frequently Asked Questions</a></li>
                                        <li><a href="#">Keterangan Obat</a></li>
                                        <li><a href="#">Jadwal dan Data Pegawai</a></li>
                                        <li><a href="#">Forum Diskusi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer bottom -->
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-8 col-md-7">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> Kelomok 1 Proyek Akhir 2 | Yosephine Pratama Klinik
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-5">
                            <div class="footer-copy-right f-right">
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <!-- counter , waypoint -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <!-- contact js -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>