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
                                {{ __('Blog Posts') }}
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
        <div id="blog" class="blog-area de-padding">
            <div class="container pl-20">

                <div class="blog-wpr border-0">
                    @if(class_exists('\Plugins\Blog\Models\Post'))
                    <div class="row">
                        @foreach (\Plugins\Blog\Models\Post::posts() as $post)
                            <!-- start single blog -->
                            <div class="col-sm-12 col-md-3 col-lg-4">
                                <div class="blog-box">
                                    <div class="blog-pic">
                                        <img src="{{$post->featured_image }}" alt="thumb">
                                    </div>
                                    <div class="blog-info">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="icofont-user-alt-4"></i> {{ $post->auth->getFullName() }}
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i> {{ $post->created_at->format('d M, y ') }}
                                            </li>
                                        </ul>
                                        <a href="{{ route('post', $post->slug ) }}">
                                            <h5 class="blog-title">
                                                {{$post->title}}
                                            </h5>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <!-- end single blog -->
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center">
                                {{ \Plugins\Blog\Models\Post::postsLinks() }}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center">
                                @lang('Blog plugin not found')
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
            <!-- end container -->
        </div>
        <!-- End Blog -->

        @include('theme::partials.footer')
    </main>
@endsection
