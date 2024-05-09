
@extends('theme::layouts.default')

@section('defaultContent')
<!-- main header -->

@include('theme::partials.header')

   <!-- Page Banner Start -->
    <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url(assets/images/backgrounds/banner.jpg);">
        <div class="container">
            <div class="banner-inner pt-70 rpt-60 text-white">
                <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Popular Services</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Our Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->


     <!-- About Area Start -->
    <section class="about-service-page py-130 rpy-100 rel z-1">
        <div class="container">
            <div class="row gap-110 align-items-center">
                <div class="col-lg-6">
                    <div class="about-content-five rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-30">
                            <h2>Smart Way To Provide Best Customer Data</h2>
                        </div>
                        <p>Sed ut perspiciatis unde omnis iste natus voluptatem accusantium doloremque laudantium totames aperiam eaque quae abillo inventore quasi architecto beatae vitae dicta sunt explicabos</p>
                        <ul class="icon-list style-two mt-40 mb-45">
                            <li><i class="fal fa-check"></i> Connect with leads with zero hassle.</li>
                            <li><i class="fal fa-check"></i> Take quick payments direct from meetings</li>
                            <li><i class="fal fa-check"></i> Start finding leads that get coverts quickly</li>
                        </ul>
                        <a href="about.html" class="theme-btn">Learn More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-images-service-page">
                        <div class="for-responsive">
                            <img src="assets/images/about/services-page.png" alt="About">
                        </div>
                        <div class="first-part" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <img src="assets/images/about/services-page.png" alt="About">
                        </div>
                        <div class="last-part" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <img src="assets/images/about/services-page.png" alt="About">
                        </div>
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logos/logo-top.png" alt="Logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->


    <!-- Feature box Area Start -->
    <section class="feature-box-area pb-90 rpb-70 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h2>Powerful approach to project planning and creation</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box style-seven">
                        <div class="icon">
                            <i class="fal fa-atom-alt"></i>
                        </div>
                        <div class="content">
                            <h5><a href="service-details.html">Proactive Blocklist Tracking</a></h5>
                            <p>Sed ut perspiciatis unde omnis iste natus doloremque laudantium totamto</p>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-seven-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box style-seven">
                        <div class="icon">
                            <i class="fal fa-rocket-launch"></i>
                        </div>
                        <div class="content">
                            <h5><a href="service-details.html">Faster Time to Inbox</a></h5>
                            <p>Sed ut perspiciatis unde omnis iste natus doloremque laudantium totamto</p>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-seven-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box style-seven">
                        <div class="icon">
                            <i class="far fa-bullseye-pointer"></i>
                        </div>
                        <div class="content">
                            <h5><a href="service-details.html">Build Confidence with BIMI</a></h5>
                            <p>Sed ut perspiciatis unde omnis iste natus doloremque laudantium totamto</p>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-seven-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box style-seven">
                        <div class="icon">
                            <i class="far fa-anchor"></i>
                        </div>
                        <div class="content">
                            <h5><a href="service-details.html">Manage Dedicated IPs</a></h5>
                            <p>Sed ut perspiciatis unde omnis iste natus doloremque laudantium totamto</p>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-seven-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box style-seven">
                        <div class="icon">
                            <i class="far fa-layer-group"></i>
                        </div>
                        <div class="content">
                            <h5><a href="service-details.html">Dynamic suppression List</a></h5>
                            <p>Sed ut perspiciatis unde omnis iste natus doloremque laudantium totamto</p>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-seven-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box style-seven">
                        <div class="icon">
                            <i class="far fa-shield-check"></i>
                        </div>
                        <div class="content">
                            <h5><a href="service-details.html">Verify DNS Records</a></h5>
                            <p>Sed ut perspiciatis unde omnis iste natus doloremque laudantium totamto</p>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-seven-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature box Area End -->


    <!-- CTA Area Start -->
    <section class="cta-area bgs-cover py-130 rpy-100" style="background-image: url(assets/images/backgrounds/cta.jpg);">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-8">
                    <div class="cta-content text-white rmb-35" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-40">
                            <span class="subtitle d-block mb-10">Website Builder</span>
                            <h2>Ready Work Together to Create Website?</h2>
                        </div>
                        <a href="contact.html" class="theme-btn">Contact Us <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cta-btn text-lg-center text-start ps-lg-0 ps-2" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Area End -->


    <!-- Pricing Area Start -->
    <section class="pricing-area-six bgc-lighter overflow-hidden rel z-1 pt-125 rpt-95 pb-100 rpb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-11">
                    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h2>Easy to Start, Easy to Scale Website Builder Plans</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="pricing-item style-five">
                        <div class="title-price">
                            <h5 class="title">Regular</h5>
                            <div class="price"><span class="prev">$</span>15.<span class="next">/m</span></div>
                        </div>
                        <hr>
                        <div class="text">Data curation involve the careful election organization, and maintenance</div>
                        <ul class="icon-list">
                            <li><i class="fal fa-check"></i> 2 Limited sites available</li>
                            <li><i class="fal fa-check"></i> 1 GB storage per site</li>
                            <li><i class="fal fa-check"></i> Up to 5 pages per site</li>
                            <li class="hide"><i class="fal fa-check"></i> Free SSL for custom domain</li>
                            <li class="hide"><i class="fal fa-check"></i> Connect custom domain</li>
                        </ul>
                        <a href="#" class="theme-btn style-two">Choose Package <i class="far fa-arrow-right"></i></a>
                        <div class="footer-text">No credit card required</div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="pricing-item style-five">
                        <div class="title-price">
                            <h5 class="title color-two">Standard</h5>
                            <div class="price"><span class="prev">$</span>35.<span class="next">/m</span></div>
                        </div>
                        <hr>
                        <div class="text">Data curation involve the careful election organization, and maintenance</div>
                        <ul class="icon-list">
                            <li><i class="fal fa-check"></i> 2 Limited sites available</li>
                            <li><i class="fal fa-check"></i> 1 GB storage per site</li>
                            <li><i class="fal fa-check"></i> Up to 5 pages per site</li>
                            <li><i class="fal fa-check"></i> Free SSL for custom domain</li>
                            <li class="hide"><i class="fal fa-check"></i> Connect custom domain</li>
                        </ul>
                        <a href="#" class="theme-btn style-two">Choose Package <i class="far fa-arrow-right"></i></a>
                        <div class="footer-text">No credit card required</div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="pricing-item style-five">
                        <div class="title-price">
                            <h5 class="title color-four">Diamond</h5>
                            <div class="price"><span class="prev">$</span>98.<span class="next">/m</span></div>
                        </div>
                        <hr>
                        <div class="text">Data curation involve the careful election organization, and maintenance</div>
                        <ul class="icon-list">
                            <li><i class="fal fa-check"></i> 2 Limited sites available</li>
                            <li><i class="fal fa-check"></i> 1 GB storage per site</li>
                            <li><i class="fal fa-check"></i> Up to 5 pages per site</li>
                            <li><i class="fal fa-check"></i> Free SSL for custom domain</li>
                            <li><i class="fal fa-check"></i> Connect custom domain</li>
                        </ul>
                        <a href="#" class="theme-btn style-two">Choose Package <i class="far fa-arrow-right"></i></a>
                        <div class="footer-text">No credit card required</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-circle-shapes">
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Pricing Area End -->


    <!-- Client Logos Area Start -->
    <section class="client-logo-area-two pt-130 rpt-100 pb-95 rpb-65">
        <div class="section-title text-center mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
            <h4>I’ve <span>1253</span>+ Global Clients & lot’s of Project Complete</h4>
        </div>
        <div class="container">
            <div class="row justify-content-center row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two1.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two2.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two3.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two4.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two9.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two5.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two10.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two7.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two6.png" alt="Client Logo"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-item style-three" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <a href="#"><img src="assets/images/client-logos/client-logo-two8.png" alt="Client Logo"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Logos Area End -->


<!-- footer area start -->

@include('theme::partials.footer')
<!-- footer area end -->

@endsection
