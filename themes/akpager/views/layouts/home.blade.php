
@extends('theme::layouts.default')

@section('defaultContent')
<!-- main header -->
<header class="main-header menu-absolute header-white no-border">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container container-1660 clearfix">

            <div class="header-inner py-15 rel d-flex align-items-center">
                <div class="logo-outer">
                    <div class="logo"><a href="/"><img src="{{ __o('site_logo') }}" alt="Logo" title="Logo"></a></div>
                </div>

                <div class="nav-outer ms-lg-auto clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header py-10">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <img src="assets/images/logos/logo.png" alt="Logo" title="Logo">
                                </a>
                            </div>

                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="dropdown"><a href="#">Home</a>
                                    <ul>
                                        <li class="dropdown"><a href="#">MultiPage</a>
                                            <ul>
                                                <li><a href="index.html">Business</a></li>
                                                <li><a href="index2.html">Lead Capture</a></li>
                                                <li><a href="index3.html">Software Landing</a></li>
                                                <li><a href="index4.html">E-learning</a></li>
                                                <li><a href="index5.html">Saas Landing</a></li>
                                                <li><a href="index6.html">AI Software</a></li>
                                                <li><a href="index7.html">Website Builder</a></li>
                                                <li><a href="index8.html">Fintech</a></li>
                                                <li><a href="index9.html">Chatbot</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">OnePage</a>
                                            <ul>
                                                <li><a href="index1-onepage.html">Business</a></li>
                                                <li><a href="index2-onepage.html">Lead Capture</a></li>
                                                <li><a href="index3-onepage.html">Software Landing</a></li>
                                                <li><a href="index4-onepage.html">E-learning</a></li>
                                                <li><a href="index5-onepage.html">Saas Landing</a></li>
                                                <li><a href="index6-onepage.html">AI Software</a></li>
                                                <li><a href="index7-onepage.html">Website Builder</a></li>
                                                <li><a href="index8-onepage.html">Fintech</a></li>
                                                <li><a href="index9-onepage.html">Chatbot</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">pages</a>
                                    <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="faqs.html">faqs</a></li>
                                        <li><a href="team.html">Team Members</a></li>
                                        <li><a href="pricing.html">Pricing Plan</a></li>
                                        <li><a href="contact.html">Contact us</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="404.html">404 error</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="services.html">Our Services</a></li>
                                        <li><a href="service-details.html">Service Details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Shop</a>
                                    <ul>
                                        <li><a href="shop.html">our Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Projects</a>
                                    <ul>
                                        <li><a href="projects.html">Project Grid</a></li>
                                        <li><a href="project-list.html">Project List</a></li>
                                        <li><a href="project-masonry.html">Project Masonry</a></li>
                                        <li><a href="project-details.html">Project Details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">blog</a>
                                    <ul>
                                        <li><a href="blog.html">blog standard</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </nav>
                    <!-- Main Menu End-->
                </div>

                <!-- Nav Search -->
                <div class="nav-search ms-xl-2 ms-4 py-10">
                    <button class="far fa-search"></button>
                    <form action="#" class="hide">
                        <input type="text" placeholder="Search" class="searchbox" required="">
                        <button type="submit" class="searchbutton far fa-search"></button>
                    </form>
                </div>

                <!-- Menu Button -->
                <div class="menu-btns ms-lg-auto d-none d-xl-flex">
                    <a href="contact.html" class="theme-btn">Get Started <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
</header>


<!-- Hero area start -->
<section class="hero-area bgs-cover py-250 rpy-150 overlay" style="background-image: url(assets/images/hero/hero-one.png);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-11">
                <div class="hero-content text-center text-white">
                    <span class="subtitle-one mb-20" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"><i class="fas fa-rocket-launch"></i> Awards Winning Agency</span>
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">Everything you need to start and run your business grow</h1>
                    <div class="hero-btns" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1500" data-aos-offset="50">
                        <a href="about.html" class="theme-btn">Learn More <i class="far fa-arrow-right"></i></a>
                        <a href="services.html" class="theme-btn style-two">Our Services <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero area End -->


<!-- Services Area Start -->
<section class="services-area bgp-bottom bgc-navyblue pb-55 rel z-2" style="background-image: url(assets/images/backgrounds/wave-shape.png);">
    <div class="container">
        <div class="services-wrap">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box">
                        <div class="icon">
                            <i class="flaticon-customer-service-1"></i>
                        </div>
                        <div class="content">
                            <h4><a href="service-details.html">Best Quality Services</a></h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                            <hr>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box">
                        <div class="icon">
                            <i class="flaticon-idea"></i>
                        </div>
                        <div class="content">
                            <h4><a href="service-details.html">Innovation Ideas</a></h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                            <hr>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="iconic-box">
                        <div class="icon">
                            <i class="flaticon-earning"></i>
                        </div>
                        <div class="content">
                            <h4><a href="service-details.html">Business Growth</a></h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                            <hr>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/iconic-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <blockquote class="blockquote-one text-white" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                    <div class="text">Business consulting involves the provision expert advice and guidance to organizations seeking to improve their performance, solve specific problems, or achieve specific objectives. The primary purpose of business consultants is to leverage their expertise and experience to help clients make informed decisions, develop strategies, and implement</div>
                    <div class="author">
                        <img src="assets/images/blog/blockquote.png" alt="Author">
                        <div class="name"><h5>Ricky J. Winter/</h5> <span>CEO &amp; Founder</span></div>
                    </div>
                </blockquote>
            </div>
        </div>
    </div>
</section>
<!-- Services Area End -->


<!-- About Area Start -->
<section class="about-area py-90 rpy-60">
    <div class="container">
        <div class="row gap-90 align-items-center">
            <div class="col-lg-6">
                <div class="about-images my-40" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <img src="assets/images/about/about.jpg" alt="About">
                    <div class="about-over">
                        <img src="assets/images/about/about2.png" alt="About">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content mt-40 rmt-15" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-30">
                        <h2>Discover Our Company's Vision and Commitment to Excellence</h2>
                    </div>
                    <p>Business consulting is a dynamic and multifaceted field that plays a pivotal role in helping organizations thrive in today's competitive landscape. These consulting services are sought after by businesses of all sizes</p>
                    <div class="row pt-30">
                        <div class="col-sm-6">
                            <div class="counter-item counter-text-wrap counted">
                                <span class="count-text percent" data-speed="3000" data-stop="95">95</span>
                                <h5 class="counter-title">Strategy Consulting</h5>
                                <div class="text">Strategy consultants work closely organizations define their</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="counter-item counter-text-wrap counted">
                                <span class="count-text percent" data-speed="3000" data-stop="85">85</span>
                                <h5 class="counter-title">Financial Consulting</h5>
                                <div class="text">Financial consultants provides the financial planning, budgeting</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Area End -->


<!-- Solutions Area End -->
<section class="solutions-area pb-100 rpb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-11">
                <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Discover Company Solutions Tailored to Your Needs</h2>
                    <p>Sed ut perspiciatis unde omnis iste sit voluptatem accusantium doloremque laudantium rem aperiam eaqups quae ab illo inventore veritatis et quasi architecto </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="fancy-box" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box1.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <div class="icon-title">
                            <i class="flaticon-meeting"></i>
                            <h5><a href="service-details.html">Business Consulting</a></h5>
                        </div>
                        <div class="inner-content">
                            <p>Assisting clients with financial planning, budgeting, investment strategies</p>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="fancy-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box2.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <div class="icon-title">
                            <i class="flaticon-financial-advisor"></i>
                            <h5><a href="service-details.html">Financial Advisory</a></h5>
                        </div>
                        <div class="inner-content" style="display: none;">
                            <p>Assisting clients with financial planning, budgeting, investment strategies</p>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="fancy-box" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box3.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <div class="icon-title">
                            <i class="flaticon-meeting"></i>
                            <h5><a href="service-details.html">Marketing &amp; Branding</a></h5>
                        </div>
                        <div class="inner-content" style="display: none;">
                            <p>Assisting clients with financial planning, budgeting, investment strategies</p>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="fancy-box" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box4.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <div class="icon-title">
                            <i class="flaticon-brand-identity"></i>
                            <h5><a href="service-details.html">Marketing &amp; Branding</a></h5>
                        </div>
                        <div class="inner-content" style="display: none;">
                            <p>Assisting clients with financial planning, budgeting, investment strategies</p>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="fancy-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box5.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <div class="icon-title">
                            <i class="flaticon-technology"></i>
                            <h5><a href="service-details.html">IT and Technology</a></h5>
                        </div>
                        <div class="inner-content" style="display: none;">
                            <p>Assisting clients with financial planning, budgeting, investment strategies</p>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="fancy-box" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box6.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <div class="icon-title">
                            <i class="flaticon-talent-search"></i>
                            <h5><a href="service-details.html">Human Resources</a></h5>
                        </div>
                        <div class="inner-content" style="display: none;">
                            <p>Assisting clients with financial planning, budgeting, investment strategies</p>
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Solutions Area End -->


<!-- CTA Area Start -->
<section class="cta-area bgs-cover py-130 rpy-100" style="background-image: url(assets/images/backgrounds/cta.jpg);">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 col-lg-8">
                <div class="cta-content text-white rmb-35" data-aos="fade-left" data-aos-duration="1000" data-aos-offset="50">
                    <div class="section-title mb-40">
                        <span class="subtitle d-block mb-10">Website Builder</span>
                        <h2>Ready Work Together to Create Website?</h2>
                    </div>
                    <a href="contact.html" class="theme-btn">Contact Us <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cta-btn text-lg-center text-start ps-lg-0 ps-2" data-aos="zoom-in-right" data-aos-duration="1000">
                    <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA Area End -->


<!-- Recent Projects Area End -->
<section class="project-area pt-130 rpt-100 pb-100 rpb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Explore Our Recent Case Studies & Projects</h2>
                    <p>Sed ut perspiciatis unde omnis iste sit voluptatem accusantium doloremque laudantium rem aperiam eaqups quae ab illo inventore veritatis et quasi architecto </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                <div class="fancy-box style-two" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box-two1.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <a href="#" class="category">Business Consulting</a>
                        <h6><a href="service-details.html">How We Transformed Client's Operations</a></h6>
                        <div class="inner-content" style="display: block; overflow: hidden; height: 0.0041635px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-two-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                <div class="fancy-box style-two" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box-two2.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <a href="#" class="category">Financeal</a>
                        <h6><a href="service-details.html">Journey with Our Service Financial Story</a></h6>
                        <div class="inner-content">
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-two-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                <div class="fancy-box style-two" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box-two3.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <a href="#" class="category">Research</a>
                        <h6><a href="service-details.html">Innovative Solutions in Action User Research</a></h6>
                        <div class="inner-content">
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-two-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                <div class="fancy-box style-two" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/fancy-box/fancy-box-two4.jpg" alt="Fancy Box">
                    </div>
                    <div class="content">
                        <a href="#" class="category">Development</a>
                        <h6><a href="service-details.html">Proven Results Client’s  with Our Solutions</a></h6>
                        <div class="inner-content">
                            <a href="service-details.html" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="bg">
                            <img src="assets/images/shapes/fancy-box-two-bg.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Recent Projects Area End -->


<!-- Counter TimeLine Area Start -->
<div class="counter-timeline-area">
    <div class="container">
        <div class="counter-timeline-wrap">
            <div class="row no-gap justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="counter-timeline-item counter-text-wrap" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                        <div class="icon"><i class="flaticon-review"></i></div>
                        <span class="dots">
                            <img src="assets/images/shapes/counter-dots.png" alt="Shape">
                        </span>
                        <div class="content">
                            <span class="count-text k-plus" data-speed="3000" data-stop="25">0</span>
                            <span class="counter-title">100% Satisficed Clients</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="counter-timeline-item counter-text-wrap" data-aos="fade-down" data-aos-duration="1000" data-aos-offset="50">
                        <div class="content">
                            <span class="count-text k-plus" data-speed="3000" data-stop="235">0</span>
                            <span class="counter-title">Task Complete For Global Clients</span>
                        </div>
                        <span class="dots">
                            <img src="assets/images/shapes/counter-dots.png" alt="Shape">
                        </span>
                        <div class="icon"><i class="flaticon-layers-1"></i></div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="counter-timeline-item counter-text-wrap" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                        <div class="icon"><i class="flaticon-online-registration"></i></div>
                        <span class="dots">
                            <img src="assets/images/shapes/counter-dots.png" alt="Shape">
                        </span>
                        <div class="content">
                            <span class="count-text plus" data-speed="3000" data-stop="1052">0</span>
                            <span class="counter-title">Regular Free Registation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter TimeLine Area End -->


<!-- Management Area Start -->
<section class="management-area bgp-bottom bgc-navyblue py-60" style="background-image: url(assets/images/backgrounds/wave-shape.png);">
    <div class="container">
        <div class="row gap-110 align-items-center">
            <div class="col-lg-6">
                <div class="management-content text-white mt-40" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-30">
                        <h2>Take Effect Control of Business Management</h2>
                    </div>
                    <p>Sed ut perspiciatis unde omnis iste natus voluptatem accusantium doloremque laudantium totamto aperiame eaque</p>
                    <div class="row gap-50 pt-25">
                        <div class="col-md-6">
                            <div class="iconic-box style-nine text-white">
                                <div class="icon">
                                    <i class="fal fa-laptop-code"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="service-details.html">Mobile Friendly</a></h5>
                                    <p>Mistaken denouncing pleasure praising born will give</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="iconic-box style-nine text-white">
                                <div class="icon">
                                    <i class="fal fa-cog"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="service-details.html">Powerful Prediction</a></h5>
                                    <p>At vero eos et accus amusesy praesen deleniti corruptie</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="management-images my-40" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <img src="assets/images/about/management1.png" alt="Management">
                    <div class="management-over">
                        <img src="assets/images/about/management2.png" alt="Management">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Management Area End -->


<!-- Testimonials Area Start -->
<section class="testimonials-area pt-130 rpt-100 pb-80 rpb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-11">
                <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>1253+ Global Clients Say About Our Business Services</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="marquee-slider-right testi-slider-right">
        <div class="testimonial-item">
            <div class="author">
                <div class="image">
                    <img src="assets/images/testimonials/author1.png" alt="Author">
                </div>
                <div class="title"><b>Dennis J. Lester /</b> CEO & Founder</div>
            </div>
            <div class="author-text">At vero eoset accusamus iusto dignissimos ducimus blanditiis praesentium voluptatume delenitie corruptie dolores molestias</div>
            <div class="testi-footer">
                <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text"><span>4.7/5</span> on Trustpilot</span>
            </div>
        </div>
        <div class="testimonial-item">
            <div class="author">
                <div class="image">
                    <img src="assets/images/testimonials/author2.png" alt="Author">
                </div>
                <div class="title"><b>Nicholas S. Moore /</b> Manager</div>
            </div>
            <div class="author-text">At vero eoset accusamus iusto dignissimos ducimus blanditiis praesentium voluptatume delenitie corruptie dolores molestias</div>
            <div class="testi-footer">
                <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text"><span>4.7/5</span> on Trustpilot</span>
            </div>
        </div>
        <div class="testimonial-item">
            <div class="author">
                <div class="image">
                    <img src="assets/images/testimonials/author3.png" alt="Author">
                </div>
                <div class="title"><b>Mark S. Dearing /</b> Designer</div>
            </div>
            <div class="author-text">At vero eoset accusamus iusto dignissimos ducimus blanditiis praesentium voluptatume delenitie corruptie dolores molestias</div>
            <div class="testi-footer">
                <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text"><span>4.7/5</span> on Trustpilot</span>
            </div>
        </div>
    </div>
    <div class="marquee-slider-left testi-slider-left" dir="rtl">
        <div class="testimonial-item">
            <div class="author">
                <div class="image">
                    <img src="assets/images/testimonials/author5.png" alt="Author">
                </div>
                <div class="title"><b>Joseph D. Tucker / </b> Consultant</div>
            </div>
            <div class="author-text">At vero eoset accusamus iusto dignissimos ducimus blanditiis praesentium voluptatume delenitie corruptie dolores molestias</div>
            <div class="testi-footer">
                <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text"><span>4.7/5</span> on Trustpilot</span>
            </div>
        </div>
        <div class="testimonial-item">
            <div class="author">
                <div class="image">
                    <img src="assets/images/testimonials/author6.png" alt="Author">
                </div>
                <div class="title"><b>Wiley D. Swanson / </b> Businessman</div>
            </div>
            <div class="author-text">At vero eoset accusamus iusto dignissimos ducimus blanditiis praesentium voluptatume delenitie corruptie dolores molestias</div>
            <div class="testi-footer">
                <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text"><span>4.7/5</span> on Trustpilot</span>
            </div>
        </div>
        <div class="testimonial-item">
            <div class="author">
                <div class="image">
                    <img src="assets/images/testimonials/author7.png" alt="Author">
                </div>
                <div class="title"><b>Steven J. Ung / </b> JR Manager</div>
            </div>
            <div class="author-text">At vero eoset accusamus iusto dignissimos ducimus blanditiis praesentium voluptatume delenitie corruptie dolores molestias</div>
            <div class="testi-footer">
                <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text"><span>4.7/5</span> on Trustpilot</span>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Area End -->


<!-- Blog Area Start -->
<section class="blog-area pb-100 rpb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-11">
                <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Get Every Single Updates and Learn Our News & Blog</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="blog-item style-two" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/blog/blog4.png" alt="Blog">
                        <div class="date"><b>25</b><span>Sep</span></div>
                    </div>
                    <div class="content">
                        <a href="#" class="category">Business</a>
                        <h5><a href="blog-details.html">Meet Success the Cale Smashing Book By Addy Osmania</a></h5>
                        <ul class="blog-meta">
                            <li><i class="far fa-user-circle"></i> <a href="#">Roger J. Spaulding</a></li>
                            <li><i class="far fa-comment-lines"></i> <a href="#">Comments(5)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="blog-item style-two" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/blog/blog5.png" alt="Blog">
                        <div class="date"><b>28</b><span>Sep</span></div>
                    </div>
                    <div class="content">
                        <a href="#" class="category">Finance</a>
                        <h5><a href="blog-details.html">Practical Design Tips Guidelines For Beginner Designers</a></h5>
                        <ul class="blog-meta">
                            <li><i class="far fa-user-circle"></i> <a href="#">Roger J. Spaulding</a></li>
                            <li><i class="far fa-comment-lines"></i> <a href="#">Comments(5)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-10">
                <div class="blog-item style-two" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
                    <div class="image">
                        <img src="assets/images/blog/blog6.png" alt="Blog">
                        <div class="date"><b>30</b><span>Sep</span></div>
                    </div>
                    <div class="content">
                        <a href="#" class="category">Research</a>
                        <h5><a href="blog-details.html">Meet Success the Cale Smashing Book By Addy Osmania</a></h5>
                        <ul class="blog-meta">
                            <li><i class="far fa-user-circle"></i> <a href="#">Roger J. Spaulding</a></li>
                            <li><i class="far fa-comment-lines"></i> <a href="#">Comments(5)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Area End -->


<!-- Client Logos Area Start -->
<section class="client-logo-area pb-90 rpb-65">
    <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
        <h4>I’ve 1253+ Global Clients & lot’s of Project Complete</h4>
    </div>
    <div class="client-logo-wrap">
        <div class="client-logo-item" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two1.png" alt="Client Logo"></a>
        </div>
        <div class="client-logo-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two2.png" alt="Client Logo"></a>
        </div>
        <div class="client-logo-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two3.png" alt="Client Logo"></a>
        </div>
        <div class="client-logo-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two4.png" alt="Client Logo"></a>
        </div>
        <div class="client-logo-item" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two5.png" alt="Client Logo"></a>
        </div>
        <div class="client-logo-item" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two6.png" alt="Client Logo"></a>
        </div>
        <div class="client-logo-item" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two7.png" alt="Client Logo"></a>
        </div>
        <div class="client-logo-item" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000" data-aos-offset="50">
            <a href="#"><img src="assets/images/client-logos/client-logo-two8.png" alt="Client Logo"></a>
        </div>
    </div>
</section>
<!-- Client Logos Area End -->


<!-- footer area start -->
<footer class="main-footer footer-one rel z-1 mt-100">
    <div class="container">
        <div class="footer-newsletter text-white">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="logo-part" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="logo mb-10">
                            <a href="index.html"><img src="assets/images/logos/logo-white.png" alt="Logo"></a>
                        </div>
                        <p>Digital Business Consulting Agency</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="form-part" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <h5>Subscribe Our Newsletter</h5>
                        <form class="newsletter-form mt-15" action="#">
                            <input type="email" placeholder="Email Address" required="">
                            <button type="submit">Sign Up <i class="far fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer-widget widget-about" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h6 class="footer-title">About Company</h6>
                    <p>Doloremque laudantium tota aperiam eaque abillo inventore architect beatae vitae dicta sunt explicabos</p>
                    <div class="social-style-one">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 order-xl-2">
                <div class="footer-widget widget-contact" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1500" data-aos-offset="50">
                    <h6 class="footer-title">Contact</h6>
                    <ul>
                        <li><i class="fal fa-map-marker-alt"></i> 55 Main Street, 2nd block Melbourne, Australia</li>
                        <li><i class="fal fa-envelope"></i> <a href="mailto:support@gmail.com">support@gmail.com</a></li>
                        <li><i class="fal fa-phone"></i> <a href="callto:+0001234455">+000 (123) 44 55</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-sm-4 col-6">
                        <div class="footer-widget widget-links" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <h6 class="footer-title">Resources</h6>
                            <ul>
                                <li><a href="shop.html">Product</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="services.html">Benefits</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-6">
                        <div class="footer-widget widget-links" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <h6 class="footer-title">Quick Link</h6>
                            <ul>
                                <li><a href="services.html">Features</a></li>
                                <li><a href="pricing.html">Pricing Plan</a></li>
                                <li><a href="about.html">Best Program</a></li>
                                <li><a href="contact.html">Press Kit</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-6">
                        <div class="footer-widget widget-links"  data-aos="fade-up" data-aos-delay="300" data-aos-duration="1500" data-aos-offset="50">
                            <h6 class="footer-title">Company</h6>
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="team.html">Team Member</a></li>
                                <li><a href="about.html">Reviews</a></li>
                                <li><a href="blog.html">Latest News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom mt-30 py-15">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="copyright-text pt-10 text-lg-start text-center" data-aos="fade-left" data-aos-duration="1000" data-aos-offset="50">
                        <p>Copyright @2024, <a href="index.html">Akpager </a> All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6">
                    <div class="footer-bottom-menu text-lg-end text-center" data-aos="fade-right" data-aos-duration="1000" data-aos-offset="50">
                        <ul>
                            <li><a href="faqs.html">Faqs</a></li>
                            <li><a href="about.html">Setting</a></li>
                            <li><a href="about.html">Privacy</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Scroll Top Button -->
            <button class="scroll-top scroll-to-target" data-target="html"><span class="far fa-angle-double-up"></span></button>
        </div>
    </div>
</footer>
<!-- footer area end -->

@endsection
