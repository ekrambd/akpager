
@extends('theme::layouts.default')

@section('defaultContent')
<!-- main header -->
@include('theme::partials.header')
<!-- end main header -->



       <!-- Page Banner Start -->
       <section class="page-banner-area overlay py-250 rpy-120 rel z-1 bgs-cover text-center" style="background-image: url(assets/images/backgrounds/banner.jpg);">
        <div class="container">
            <div class="banner-inner pt-70 rpt-60 text-white">
                <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Blog Standard</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog Standard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->


    <!-- Blog Standard Area Start -->
    <section class="blog-standard-area py-130 rpy-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-standard-wrap">
                        <div class="blog-standard-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="assets/images/blog/blog-standard1.png" alt="Blog">
                            </div>
                            <div class="content">
                                <ul class="blog-meta">
                                    <li><a class="category" href="#">SEO Camping</a></li>
                                    <li><img src="assets/images/blog/author.png" alt="Author"> <a href="#">Matthew</a></li>
                                    <li><i class="far fa-calendar-alt"></i> <a href="#">September 20, 2023</a></li>
                                </ul>
                                <h3><a href="blog-details.html">Achieving Fashion Elegant Design Runway Life</a></h3>
                                <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium eaque ipsa quae abillo inventore veritatis et quasi architecto beatae</p>
                                <a href="blog-details.html" class="theme-btn style-two">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <blockquote class="blockquote-three bgc-lighter mb-50" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="text">Remote work made easy way better tools Section Bonorum et Malorum</div>
                            <h5 class="name">Michael A. Jenkins</h5>
                            <span class="designation">CEO &amp; Founder</span>
                        </blockquote>
                        <div class="blog-standard-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="assets/images/blog/blog-standard2.png" alt="Blog">
                            </div>
                            <div class="content">
                                <ul class="blog-meta">
                                    <li><a class="category" href="#">SEO Camping</a></li>
                                    <li><img src="assets/images/blog/author.png" alt="Author"> <a href="#">Matthew</a></li>
                                    <li><i class="far fa-calendar-alt"></i> <a href="#">September 20, 2023</a></li>
                                </ul>
                                <h3><a href="blog-details.html">Achieving Fashion Elegant Design Runway Life</a></h3>
                                <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium eaque ipsa quae abillo inventore veritatis et quasi architecto beatae</p>
                                <a href="blog-details.html" class="theme-btn style-two">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <blockquote class="blockquote-three bgc-primary text-white mb-50" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="text">Remote work made easy way better tools Section Bonorum et Malorum</div>
                            <h5 class="name">Michael A. Jenkins</h5>
                            <span class="designation">CEO &amp; Founder</span>
                        </blockquote>
                        <div class="blog-standard-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="assets/images/blog/blog-standard3.png" alt="Blog">
                            </div>
                            <div class="content">
                                <ul class="blog-meta">
                                    <li><a class="category" href="#">SEO Camping</a></li>
                                    <li><img src="assets/images/blog/author.png" alt="Author"> <a href="#">Matthew</a></li>
                                    <li><i class="far fa-calendar-alt"></i> <a href="#">September 20, 2023</a></li>
                                </ul>
                                <h3><a href="blog-details.html">Achieving Fashion Elegant Design Runway Life</a></h3>
                                <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium eaque ipsa quae abillo inventore veritatis et quasi architecto beatae</p>
                                <a href="blog-details.html" class="theme-btn style-two">Read More <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <ul class="pagination mt-25 flex-wrap">
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-angle-left"></i></span>
                            </li>
                            <li class="page-item active">
                                <span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-sidebar rmt-75">
                        <div class="widget widget-search" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h5 class="widget-title">Search</h5>
                            <form action="#" class="default-search-form">
                                <input type="text" placeholder="Keywords" required>
                                <button type="submit" class="searchbutton far fa-search"></button>
                            </form>
                        </div>
                        <div class="widget widget-category" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h5 class="widget-title">Category</h5>
                            <ul>
                                <li><a href="blog.html">Marketing <i class="far fa-arrow-right"></i></a></li>
                                <li><a href="blog.html">SEO optimization <i class="far fa-arrow-right"></i></a></li>
                                <li><a href="blog.html">Content Marketing <i class="far fa-arrow-right"></i></a></li>
                                <li><a href="blog.html">Keywords Research <i class="far fa-arrow-right"></i></a></li>
                                <li><a href="blog.html">Technical Adult <i class="far fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="widget widget-recent-news" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h4 class="widget-title">Recent News</h4>
                            <ul>
                                <li>
                                    <div class="image">
                                        <img src="assets/images/widget/news1.jpg" alt="News">
                                    </div>
                                    <div class="content">
                                        <span class="date">September 20, 2023</span>
                                        <h6><a href="blog-details.html">Achieving Fashion Elegant se Runway to Real Life</a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <img src="assets/images/widget/news2.jpg" alt="News">
                                    </div>
                                    <div class="content">
                                        <span class="date">September 20, 2023</span>
                                        <h6><a href="blog-details.html">Achieving Fashion Elegant se Runway to Real Life</a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <img src="assets/images/widget/news3.jpg" alt="News">
                                    </div>
                                    <div class="content">
                                        <span class="date">September 20, 2023</span>
                                        <h6><a href="blog-details.html">Achieving Fashion Elegant se Runway to Real Life</a></h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget-tag-cloud" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h4 class="widget-title">Popular Tags</h4>
                            <div class="tag-coulds">
                                <a href="blog.html">Marketing</a>
                                <a href="blog.html">Product</a>
                                <a href="blog.html">Social Media</a>
                                <a href="blog.html">SEO Optimize</a>
                                <a href="blog.html">Content</a>
                                <a href="blog.html">Design</a>
                            </div>
                        </div>
                        <div class="widget widget-cta" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h3>Boost your Digital Product marketing?</h3>
                            <a href="contact.html" class="theme-btn">Contact Us <i class="fas fa-angle-double-right"></i></a>
                            <div class="man"><img src="assets/images/widget/cta-man.png" alt="CTA"></div>
                            <div class="bg bgs-cover" style="background-image: url(assets/images/widget/cta-bg.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Standard Area End -->


<!-- footer area start -->
@include('theme::partials.footer')
<!-- footer area end -->

@endsection
