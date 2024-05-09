@extends('demo::master')

@section('content')
<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="/" target="_blank"><img src="{{ asset('plugins/demo/assets/img/1.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="/" target="_blank">
                <h6>New Sidebar Image</h6>
            </a>
        </div>
    </div>
</div>


<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="/home-2" target="_blank"><img src="{{ asset('plugins/demo/assets/img/2.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="/home-2" target="_blank">
                <h6>New Sidebar Parallax</h6>
            </a>
        </div>
    </div>
</div>
<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="/home-3" target="_blank"><img src="{{ asset('plugins/demo/assets/img/3.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="/home-3" target="_blank">
                <h6>New Sidebar Parallax Particles</h6>
            </a>
        </div>
    </div>
</div>

{{--
<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="sidebar/main/index.html"><img src="{{ asset('plugins/demo/assets/img/7.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="sidebar/main/index.html">
                <h6>Sidebar Image Animation</h6>
            </a>
        </div>
    </div>
</div>
<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="sidebar/simple/index.html"><img src="{{ asset('plugins/demo/assets/img/8.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="sidebar/simple/index.html">
                <h6>Sidebar with Image</h6>
            </a>
        </div>
    </div>
</div>

<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="sidebar/typing-text/index.html"><img src="{{ asset('plugins/demo/assets/img/9.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="sidebar/typing-text/index.html">
                <h6>Sidebar Text Center</h6>
            </a>
        </div>
    </div>
</div>
<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="topbar/main/index.html"><img src="{{ asset('plugins/demo/assets/img/10.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="topbar/main/index.html">
                <h6>Topbar Image Animation</h6>
            </a>
        </div>
    </div>
</div>
<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="topbar/simple/index.html"><img src="{{ asset('plugins/demo/assets/img/11.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="topbar/simple/index.html">
                <h6>Topbar with Image</h6>
            </a>
        </div>
    </div>
</div>
<div class="col-md-4 mt-50">
    <div class="single_demo_link">
        <div class="demo_img">
            <a href="topbar/typing-text/index.html"><img src="{{ asset('plugins/demo/assets/img/12.jpg') }}" alt="" /></a>
        </div>
        <div class="demo_title">
            <a href="topbar/typing-text/index.html">
                <h6>Topbar Text Center</h6>
            </a>
        </div>
    </div>
</div>
--}}
@endSection
