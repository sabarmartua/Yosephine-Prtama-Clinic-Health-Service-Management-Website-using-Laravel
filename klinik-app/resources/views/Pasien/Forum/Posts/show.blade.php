<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Yosephine Pratama</title>
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
        <!-- Content Area -->
        <div class="container mt-5">
            @auth
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'pasien')
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Post Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $post->body }}</p>
                            <p class="card-text"><small class="text-muted">Posted by {{ $post->user->name }}</small></p>

                            @if(Auth::id() === $post->user_id || Auth::user()->is_admin)
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif

                            <!-- Replies Section -->
                            <div class="mt-4">
                                <h6>Replies:</h6>
                                @foreach($post->replies as $reply)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <p class="card-text">{{ $reply->body }}</p>
                                        <p class="card-text"><small class="text-muted">Replied by {{ $reply->user->name }}</small></p>

                                        @if(Auth::id() === $reply->user_id || Auth::user()->is_admin)
                                        <a href="{{ route('replies.edit', $reply) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('replies.destroy', $reply) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                @endforeach

                                <!-- Reply Form -->
                                @auth
                                <form action="{{ route('replies.store', $post) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="body">Your Reply</label>
                                        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Reply</button>
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endauth
        
        @guest
        <div class="alert alert-warning"><h1>Please login to access this section.</h1></div>
        @endguest
    </main><br><br>
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
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
    <script src="{{ asset
</body>
</html>