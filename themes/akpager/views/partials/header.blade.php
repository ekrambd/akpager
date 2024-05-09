<header class="main-header menu-absolute header-white no-border">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container container-1660 clearfix">

            <div class="header-inner py-15 rel d-flex align-items-center">
                <div class="logo-outer">
                    <div class="logo"><a href="/">
                        <img src="{{ __o('site_logo') }}" alt="Logo" ></a>
                    </div>
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

                                {!! menu('site', 'theme::menu') !!}

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
