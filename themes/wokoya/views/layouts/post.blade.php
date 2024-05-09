@extends('theme::layouts.default')

@section('defaultContent')

    <main class="main">

        <!-- Start Hero
                  ============================================= -->
        <div id="home" class="hero-section hero-page d-flex justify-content-center">
            <div class="line_wrap">
                <!-- line animation -->
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
            </div> <!-- end line animation -->
            <div class="container top-info-blog">
                <div class="blog-wpr ">
                    <div class="row">
                        <div class="d-flex align-items-center">
                            <h1 class="phone_contact m-5">
                                {{ $page->title }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single Hero End -->
        </div>
        <!-- End Hero -->

        <!-- Start Blog
                  ============================================= -->
        <div id="blog" class="blog-area">
            <div class="container pl-20">

                <div class="blog-wpr border-0">
                    <div class="row">


                        <div class="col">
                            <div class="meta d-inline-block">
                                <span>
                                    <i class="icofont-ui-user"></i> {{ $page->auth->getFullName() }}
                                </span>
                                <span class="date">
                                    <i class="icofont-calendar"></i> {{ $page->created_at->format('d M, y ') }}
                                </span><span>
                                    <i class="icofont-location-arrow"></i> {{ $page->category->name }}
                                </span>
                                @if ($page->tags)
                                    <span>
                                        <i class="icofont-ui-tag"></i> {{ $page->tags }}
                                    </span>
                                @endif

                            </div>
                            @if ($page->featured_image)
                                <div class="my-5">
                                    <img src="{{ $page->featured_image }}" class="img-fluid" alt="{{ $page->title }} Post">
                                </div>
                            @endif

                            <div class="">
                                {!! $page->content !!}
                            </div>

                        </div>

                        @include('theme::partials.disqus_comments')

                        <div class="mb-5"></div>
                    </div>

                </div>

            </div>
            <!-- end container -->
        </div>
        <!-- End Blog -->

        @include('theme::partials.footer')
    </main>
@endsection
