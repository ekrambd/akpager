<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Wokoya | Laravel CMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plugins/demo/assets/img/favicon.png') }}">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('plugins/demo/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/bsnav.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/icofont.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/splitting.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/css/splitting-cells.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/demo/assets/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/demo/assets/css/responsive.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
</head>

<body class="side-header" data-spy="scroll" data-target=".navbar" data-offset="1">

    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader End -->

    <div class="theme_all_wrap" data-magic-cursor=" " data-color="crimson">

        <!-- Document Wrapper
=============================== -->
        <div id="main-wrapper">
            <!-- Start header
    ============================================= -->

            <header class="header">
                <div class="main-navigation sd-nav">
                    <div class="navbar navbar-expand-lg bsnav bsnav-sidebar bsnav-scrollspy bsnav-sidebar-left">
                        <a class="navbar-brand" href="/demos">
                            <img src="{{ asset('plugins/demo/assets/img/logo.png') }}" class="logo-display" alt="thumb">
                        </a>
                        <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse justify-content-sm-center pt-20">
                            <ul class="navbar-nav navbar-mobile mr-0">
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#home"><i class="icofont-home"></i> <span class="toltip">Home</span> </a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#demo"><i class="icofont-contact-add"></i> <span class="toltip">Demos</span></a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact"><i class="icofont-file-document"> </i><span class="toltip">Footer</span> </a></li>
                            </ul>
                        </div>
                        <div class="sidebar-copyright pt-10">
                            <p class="copyright">@ Wokoya</p>
                        </div>
                    </div>
                    <div class="bsnav-mobile">
                        <div class="bsnav-mobile-overlay"></div>
                        <div class="navbar"></div>
                    </div>
                </div>
            </header>
            <!-- Header End -->

            <div class="clearfix"></div>

            <div class="main-area-width">

                <main class="main">

                    <!-- Start Hero
		============================================= -->
                    <div id="home" class="hero-section hero-section-bg">
                        <div class="line_wrap">
                            <!-- line animation -->
                            <div class="line_item"></div>
                            <div class="line_item"></div>
                            <div class="line_item"></div>
                            <div class="line_item"></div>
                            <div class="line_item"></div>
                        </div> <!-- end line animation -->
                        <div class="hero-single sidebar-hero-bg">
                            <div class="container">
                                <!-- start container -->
                                <div class="row">
                                    <!-- start row -->
                                    <div class="col-md-12 text-center col-sm-12 pl-20">
                                        <!-- hero text left -->
                                        <div class="hero-content wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s">
                                            <h2 data-splitting class="top-title pt-30 wow fadeInUp" data-wow-duration=".001s" data-wow-delay=".001s">
                                                Home Style <span class="colored">Demo 12.</span>
                                            </h2>
                                        </div>
                                    </div> <!-- hero left text end -->
                                </div>
                            </div>
                        </div><!-- single Hero End -->
                    </div>
                    <!-- End Hero -->

                    <div class="demo_link mt-50 pb-100" id="demo">
                        <div class="container">
                           <div class="row">
                               @yield('content')
                           </div>
                        </div>
                    </div>

                    <!-- Start Footer
	============================================= -->
                    <footer id="contact" class="footer">
                        <div class="copyright-area">
                            <!-- start copyright -->
                            <div class="container mt-20">
                                <!-- container -->
                                <div class="row">
                                    <div class="col-md-5 mt-50">
                                        <div class="copyright-left wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".7s">
                                            <span class="copyright-text">all rights reserved by Example.Com 2024.</span>
                                        </div>
                                    </div> <!-- end col-5 -->
                                    <div class="col-md-4 mt-50">
                                        <div class="copyright-right wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".8s">
                                            <div class="copyright-menu">
                                                <a href="#">Faqs /</a>
                                                <a href="#">privacy policy /</a>
                                                <a href="#">services</a>
                                            </div>
                                        </div>
                                    </div> <!-- end col-4 -->
                                    <div class="col-md-3 mt-50">
                                        <div class="copyright-social wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".9s">
                                            <ul class="footer-social">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> <!-- end col-3 -->
                                </div>
                            </div> <!-- end container -->
                        </div> <!-- end copyright area -->
                    </footer>
                    <!-- End Footer-->
                </main>
            </div>
            <!-- Start Scroll top
	============================================= -->
            <a href="#home" id="scrtop" class="smooth-scroll"><i class="icofont-rounded-up"></i></a>
            <!-- End Scroll top-->

            <!-- CURSOR -->
            <div class="mouse-cursor cursor-outer"></div>
            <div class="mouse-cursor cursor-inner"></div>
            <!-- /CURSOR -->
        </div>
    </div> <!-- Mouse Cursor End -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('plugins/demo/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/wow.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/bsnav.min.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/splitting-animation.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/splitting.min.js') }}"></script>
    <script src="{{ asset('plugins/demo/assets/js/main.js') }}"></script>

</body>

</html>
