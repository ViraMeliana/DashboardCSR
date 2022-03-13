<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('landing-assets/images/x-icon/shopapp.png')}}">

    <link rel="stylesheet" href="{{asset('landing-assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('landing-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing-assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing-assets/css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing-assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('landing-assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing-assets/css/style.css')}}">
    <script src="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

    <title>Dashboard CSR</title>
</head>

<body>

<!-- Mobile Menu Start Here -->
<div class="mobile-menu shopapp-bg">
    <nav class="mobile-header">
        <div class="header-logo">
            <a href="/"><img src="{{asset('images/sig/s.png')}}" alt="logo"></a>
        </div>
        <div class="header-bar">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <nav class="mobile-menu">
        <div class="mobile-menu-area">
            <div class="mobile-menu-area-inner">
                <ul>
                    <li><a href="#">Home</a>
                        <ul>
                            <li><a href="index.html">Smart Seo</a></li>
                            <li><a href="index-host.html">Smart Host</a></li>
                            <li><a href="index-erp.html">Smart Erp</a></li>
                            <li><a href="index-vpn.html">Smart Vpn</a></li>
                            <li><a href="index-pos.html">Smart Pos</a></li>
                            <li><a href="index-marketing.html">Smart Marketing</a></li>
                            <li class="active"><a href="index-shopapp.html">Smart Shopapp</a></li>
                            <li><a href="index-crypto.html">Smart Crypto</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="#">Services</a>
                                <ul>
                                    <li><a href="service.html">Service</a></li>
                                    <li><a href="service-single.html">Service Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Team Member</a>
                                <ul>
                                    <li><a href="team.html">Team Style 1</a></li>
                                    <li><a href="team-2.html">Team Style 2</a></li>
                                    <li><a href="team-single.html">Team Single</a></li>
                                </ul>
                            </li>
                            <li><a href="pricing-plan.html">Pricing Plan</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="comingsoon.html">Coming Soon</a></li>
                            <li><a href="404.html">404</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Portfolio</a>
                        <ul>
                            <li><a href="portfolio.html">Portfolio Style 1</a></li>
                            <li><a href="portfolio-2.html">Portfolio Style 2</a></li>
                            <li><a href="portfolio-single.html">Portfolio Single</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blog</a>
                        <ul>
                            <li><a href="blog.html">Blog Style 1</a></li>
                            <li><a href="blog-1.html">Blog Style 2</a></li>
                            <li><a href="blog-2.html">Blog Style 3</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shop</a>
                        <ul>
                            <li><a href="shop-page.html">Shop Page</a></li>
                            <li><a href="shop-single.html">Shop Single</a></li>
                            <li><a href="cart-page.html">Cart Page</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Mobile Menu Ending Here -->


<!-- desktop menu start here -->
<header class="header-section host-bg">
    <div class="header-area">
        <div class="container">
            <div class="primary-menu">
                <div class="logo">
                    <a href="/"><img src="{{asset('landing-assets/images/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="main-area">
                    <div class="main-menu">
                        <ul>
                            <li><a href="{{route('landing.index')}}">Home</a>
                            </li>
                            <li><a href="{{route('landing.about')}}">About</a>
                            </li>
                            <li><a href="{{route('landing.activity')}}">Activity</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    @yield('content')


<footer>
    <div class="footer-top style-2 shopapp padding-tb">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-item first-set">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h6>CSR - Semen Indonesia Tbk</h6>
                                </div>
                                <div class="content">
                                    <p>We believe in Simple Creative & Flexible Design Standards.</p>
                                    <h6>Headquarters:</h6>
                                    <p>795 Folsom Ave, Suite 600 San Francisco, CA 94107</p>
                                    <ul>
                                        <li>
                                            <p><span>Phone:</span>(91) 8547 632521</p>
                                        </li>
                                        <li>
                                            <p><span>Email:</span><a href="#">info@smratshopapp.com</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h6>Features</h6>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h6>Social Contact</h6>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="#"><i class="icofont-facebook"></i>Facebook</a></li>
                                        <li><a href="#"><i class="icofont-twitter"></i>Twitter</a></li>
                                        <li><a href="#"><i class="icofont-instagram"></i>Instagram</a></li>
                                        <li><a href="#"><i class="icofont-youtube"></i>YouTube</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h6>Our Support</h6>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="#">Help Center</a></li>
                                        <li><a href="#">Paid with Mollie</a></li>
                                        <li><a href="#">Status</a></li>
                                        <li><a href="#">Changelog</a></li>
                                        <li><a href="#">Contact Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom style-2 shopapp">
        <div class="container">
            <div class="section-wrapper">
                <p>&copy; 2019 All Rights Reserved. Designed by <a href="#">CodexCoder</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section Ending Here -->

<!-- scrollToTop start here -->
<a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i><span class="pluse_1"></span><span class="pluse_2"></span></a>
<!-- scrollToTop ending here -->


<script src="{{asset('landing-assets/js/jquery.js')}}"></script>
<script src="{{asset('landing-assets/js/fontawesome.min.js')}}"></script>
<script src="{{asset('landing-assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('landing-assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing-assets/js/lightcase.js')}}"></script>
<script src="{{asset('landing-assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('landing-assets/js/swiper.min.js')}}"></script>
<script src="{{asset('landing-assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('landing-assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('landing-assets/js/progress.js')}}"></script>
<script src="{{asset('landing-assets/js/wow.min.js')}}"></script>
<script src="{{asset('landing-assets/js/functions.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@yield('scripts')
</body>
</html>
