<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('theme::partials.head')
</head>
<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"><div class="custom-loader"></div></div>

        @yield('defaultContent')

    </div>
    <!--End pagewrapper-->

    @include('theme::partials.scripts')
</body>
</html>
