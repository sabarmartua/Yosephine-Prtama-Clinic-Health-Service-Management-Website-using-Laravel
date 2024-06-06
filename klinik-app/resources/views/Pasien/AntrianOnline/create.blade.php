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
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .contact-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
            background-color: #ffffff;
        }

        .contact-form {
            background-color: #f9f9f9;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .contact-title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .button-contactForm {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
            outline: none;
        }

        .button-contactForm:hover {
            background-color: #0056b3;
        }

        .contact-image img {
            max-width: 100%;
            border-radius: 8px;
        }

        .card {
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-header {
            font-size: 20px;
        }

        .card-body .btn {
            margin-right: 5px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
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
        <section class="contact-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="contact-form animated fadeInLeft">
                            <h2 class="contact-title animated fadeInDown">Buat Antrian Anda!</h2><br>
                            <div class="col-md-12">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <form class="form-contact contact_form" action="{{ route('antrian_online.store') }}" method="post" id="appointmentForm" novalidate="novalidate">
                                @csrf
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="keperluan"><i class="fas fa-tasks"></i> Keperluan</label>
                                            <select class="form-control" id="keperluan" name="keperluan" required>
                                                <option value="">Pilih Jenis Keperluan</option>
                                                <option value="Berobat">Berobat</option>
                                                <option value="Konsultasi">Konsultasi</option>
                                                <option value="Check Up">Check Up</option>
                                                <option value="Control">Control</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal_antrian"><i class="far fa-calendar-alt"></i> Tanggal</label>
                                            <input class="form-control valid" name="tanggal_antrian" id="tanggal_antrian" type="date" placeholder="Tanggal dan Jam" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="deskripsi_singkat"><i class="fas fa-comment"></i> Deskripsi Singkat</label>
                                            <textarea class="form-control w-100" name="deskripsi_singkat" id="deskripsi_singkat" cols="30" rows="5" placeholder="Deskripsi singkat tentang hal yang ingin dikonsultasi" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3 animated fadeInUp">
                                    <button type="submit" class="button button-contactForm boxed-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-image animated fadeInRight">
                            <img src="{{ asset('admin/assets/img/gallery/team2.png') }}" alt="Image Description" class="animated bounceIn">
                        </div>
                    </div>
                </div><br><br>

                <div class="row justify-content-center mt-4">
                    @foreach($antrians as $antrian)
                    <div class="col-md-4 mb-4 animated fadeInUp">
                        <div class="card" id="card-{{ $antrian->id }}">
                            <div class="card-header">Antrian Anda Nomor: <span class="badge badge-primary">{{ $antrian->nomor_antrian }}</span></div>
                            <div class="card-body">
                                <h5 class="card-title">Keperluan: {{ $antrian->keperluan }}</h5>
                                <p class="card-text">Tanggal Antrian: {{ $antrian->tanggal_antrian }}</p>
                                <p class="card-text">Deskripsi: {{ $antrian->deskripsi_singkat }}</p>
                                <form action="{{ route('antrian_online.destroy', $antrian->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    <a href="{{ route('antrian_online.print', $antrian->id) }}" class="btn btn-sm btn-secondary">Print</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
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