<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: auto">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Annuaire Start-Up</title>
    <!-- switcher css -->
    <link href="{{asset('css/switcher.css')}}" rel="stylesheet" />

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon" sizes="144x144">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!----------------->

    
    <!----------------->
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

    </style>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="#">Annuaire Start-Up</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar">
    @if(Route::has('login'))
            <ul>
            @auth
                    <li>
                        <a href="{{ url('/home') }}" class="getstarted scrollto ">Acceuil</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}"  class="getstarted scrollto" >Connexion</a>
                    </li>
                    @if (Route::has('register'))
                    <li>
                            <a href="{{ route('register') }}" class="getstarted scrollto"  >Créer un compte</a>
                    </li>
                     @endif
                @endauth
                </ul>
            @endif
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Votre aventure digitale commence ici!</h1>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="{{ route('login') }}" class="btn-get-started scrollto" style="position: center">Connexion</a>
                    <a href="{{asset('assets/video/orange.mp4')}}"  type="video/mp4" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Présentation OrangeFab</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">

            </div>
            </div>
        </div>

</section>

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row" >

                <div class="col-lg-3 col-md-6 footer-contact" style="text-align: center">
                            <h3> Annuaire Start-Up</h3>
                    <img src="{{'img/start.JPG'}}" class="img-fluid animated"  style="width: 300px">

    </div>

                <div class="col-lg-3 col-md-6 footer-contact" style="text-align: center">

                    <h2>Localisation</h2>
                    <p>
                        Siège social<br>
                        VDN, BP 64 Dakar/Sénégal
                        <br>
                        <strong>Phone:</strong>  +221 33 839 12 00<br>
                        <strong>Email:</strong>  servicepresse.startup@orange-sonatel.com<br>
                    </p>
</div>
                <div class="col-lg-3 col-md-6 footer-contact" style="text-align: center">

                </div>
                <div class="col-lg-3 col-md-6 footer-links" >
                    <h4>Suivez nous dans les réseaux sociaux</h4>
                    <p></p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100035499206013" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="https://sn.linkedin.com/in/orange-fab-s%C3%A9n%C3%A9gal-74286417b" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Sonatel SA</span></strong>. All Rights Reserved
        </div>

    </div>
</footer><!-- End Footer -->

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{'assets/js/main.js'}}"></script>
<!-- all js include start -->

<!-- jquery -->
<script src="js/core.min.js"></script>

<!-- Search -->
<script src="search/search.js"></script>

<!-- custom scripts -->
<script src="js/main.js"></script>

<!-- form plugins js -->
<script src="quform/js/plugins.js"></script>

<!-- form scripts js -->
<script src="quform/js/scripts.js"></script>

<!-- all js include end -->

</body>
</html>
