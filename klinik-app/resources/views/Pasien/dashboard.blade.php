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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .single-slider {
            background-image: url('assets/img/logo/yosephineKlinik.jpg');
            /* Replace with the actual path to your image */
            background-size: cover;
            /* This will cover the entire div */
            background-position: center;
            /* This will center the image */
            background-repeat: no-repeat;
            /* This will prevent the image from repeating */
            height: 100vh;
            /* Ensure the div takes up the full viewport height */
            position: relative;
            /* Necessary for absolute positioning of the carousel */
            display: flex;
            /* Align items vertically center */
            align-items: center;
            /* Center align items vertically */
        }

        .card-carousel {
            position: absolute;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
        }

        .card {
            background-color: rgba(7, 176, 242, 0.8);
            color: white;
            text-align: center;
            padding: 50px;
            border: none;
            border-radius: 10px;
            width: 50rem;
            /* Lebar kartu ditingkatkan */
            height: 40rem;
            /* Sesuaikan tinggi kartu jika perlu */
            font-size: 3 rem;
        }

        .carousel-indicators li {
            background-color: #007bff;
            width: 15px;
            height: 15px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #007bff;
            border-radius: 50%;
            padding: 10px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
        }

        .faq-item {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .faq-question {
            cursor: pointer;
            text-decoration: none;
            color: #007bff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
        }

        .faq-question:hover {
            text-decoration: none;
            color: #0056b3;
            background-color: #f1f1f1;
        }

        .faq-icon {
            transition: transform 0.2s;
        }

        .faq-icon.collapsed {
            transform: rotate(0deg);
        }

        .faq-icon.expanded {
            transform: rotate(180deg);
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

        .article-card {
            margin-bottom: 1.5rem;
        }

        .article-card img {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }

        .article-card .card-body {
            padding: 1rem;
        }

        .article-card .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 0.5rem;
        }

        .article-card .card-text {
            margin-bottom: 1rem;
            color: #555;
            font-size: 0.9rem;
        }

        .article-section {
            margin-top: 4rem;
        }

        .article-section .section-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
        }

        .article-section .view-more {
            text-align: center;
            margin-top: 2rem;
        }

        .article-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
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
        <div class="single-slider d-flex align-items-center">
            <div id="cardCarousel" class="carousel slide card-carousel" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-around">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title" style="color : white;">Layanan kami 24 Jam</h2>
                                    <p style="color: white;">Kami menyediakan layanan medis berkualitas tinggi selama 24 jam penuh, dengan tim dokter dan perawat yang siap membantu Anda kapan saja. Kami berkomitmen untuk memberikan perawatan terbaik bagi kesehatan Anda.</p>
                                    <a class="btn" style="color: white;" href="{{ route('pasien.services.index')}}">Selengkapnya</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title" style="color : white;">Fasilitas Terbaik</h2>
                                    <p style="color: white;">Kami dengan bangga mempersembahkan fasilitas lengkap dan modern serta yang terbaik yang dirancang untuk memenuhi kebutuhan kesehatan Anda dan keluarga. Kesehatan Anda, prioritas kami. </p>
                                    <a class="btn" style="color: white;" href="{{ route('pasien.facilities.index')}}">Selengkapnya</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title" style="color : white;">Forum Diskusi</h2>
                                    <p style="color: white;">Forum Diskusi Klinik Yosephine Pratama adalah platform interaktif di mana Anda dapat berdiskusi, bertanya, dan berbagi pengalaman seputar kesehatan dengan para ahli medis dan anggota komunitas lainnya.</p>
                                    <a class="btn" style="color: white;" href="{{ route('posts.index')}}">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#cardCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#cardCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br><br>
        <div class="container my-5">
            <h2 class="text-center mb-4">Frequently Asked Questions (FAQ)</h2>
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                <div class="cards faq-item">
                    <div class="cards-header" id="heading{{ $faq->id }}">
                        <h2 class="mb-0">
                            <a class="faq-question" data-toggle="collapse" href="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                                {{ $faq->pertanyaan }}
                                <i class="faq-icon fas fa-chevron-down collapsed"></i>
                            </a>
                        </h2>
                    </div>

                    <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#faqAccordion">
                        <div class="cards-body">
                            <br><br>
                            <h3>{{ $faq->jawaban }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
                <br><br>
            </div>
        </div>

    </main>
    <br><br>
    <div class="container article-section">
        <h2 class="section-title">Artikel Terbaru</h2>
        <div class="row">
            @foreach($articles as $article)
            <div class="col-md-4 article-card">
                <div class="article-card h-100">
                    <img class="card-img-top" src="{{ asset('storage/' . $article->gambar) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($article->judul, 50) }}</h5>
                        <p class="card-text">{{ Str::limit($article->isi, 50) }}</p>
                        <a href="{{ route('artikel.show', $article->id) }}" class="btn btn-primary">baca..</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <br><br>

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
                                    <h4>Link Cepat Akses</h4>
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
                                </p>
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


    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/hover-direction-snake.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>