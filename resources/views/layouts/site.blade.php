<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <!-- Web Font -->

    @include('includes.head_block')

    @yield('head')

</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        @include('includes.topbar')
        <!-- End Topbar -->
        @include('includes.headermiddle')
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                @include('includes.mainmenu')
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->
    @yield('content')

    <!-- Start Footer Area -->
    @include('includes.footer')
    <!-- /End Footer Area -->

    @include('includes.footer_block')

    @yield('bottom')

</body>

</html>
