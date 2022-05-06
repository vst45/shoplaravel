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
                        <div class="col-lg-3">
                            <div class="all-category">
                                <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES
                                </h3>
                                <ul class="main-category">
                                    <li><a href="#">New Arrivals <i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a>
                                        <ul class="sub-category">
                                            @foreach ($mainCategoriesList as $category)
                                                <li><a href="#">{{ $category->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <!--
                                    <li class="main-mega"><a href="#">best selling <i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a>
                                        <ul class="mega-menu">
                                            <li class="single-menu">
                                                <a href="#" class="title-link">Shop Kid's</a>
                                                <div class="image">
                                                    <img src="/images/225x155.png" alt="#">
                                                </div>
                                                <div class="inner-link">
                                                    <a href="#">Kids Toys</a>
                                                    <a href="#">Kids Travel Car</a>
                                                    <a href="#">Kids Color Shape</a>
                                                    <a href="#">Kids Tent</a>
                                                </div>
                                            </li>
                                            <li class="single-menu">
                                                <a href="#" class="title-link">Shop Men's</a>
                                                <div class="image">
                                                    <img src="/images/225x155.png" alt="#">
                                                </div>
                                                <div class="inner-link">
                                                    <a href="#">Watch</a>
                                                    <a href="#">T-shirt</a>
                                                    <a href="#">Hoodies</a>
                                                    <a href="#">Formal Pant</a>
                                                </div>
                                            </li>
                                            <li class="single-menu">
                                                <a href="#" class="title-link">Shop Women's</a>
                                                <div class="image">
                                                    <img src="/images/225x155.png" alt="#">
                                                </div>
                                                <div class="inner-link">
                                                    <a href="#">Ladies Shirt</a>
                                                    <a href="#">Ladies Frog</a>
                                                    <a href="#">Ladies Sun Glass</a>
                                                    <a href="#">Ladies Watch</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                -->
                                    @foreach ($mainCategoriesList as $category)
                                        <li><a
                                                href="{{ route('siteCatalog', ['category' => $category->slug]) }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12">
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
