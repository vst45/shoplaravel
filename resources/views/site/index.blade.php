@extends('layouts.index')

@section('title', 'Index')

@section('content')

    <!-- Slider Area -->
    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 offset-lg-3 col-12">
                        <div class="text-inner">
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <h1><span>{!! $bigBanner->slogan !!} </span>{!! $bigBanner->title !!}</h1>
                                        <p>{!! $bigBanner->description !!}</p>
                                        <div class="button">
                                            <a href="{{ $bigBanner->url() }}" class="btn">Shop Now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Slider Area -->

    <!-- Start Small Banner  -->
    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                @include('includes.middlebanner1a', ['banner' => $middleBanners[0]])
                @include('includes.middlebanner1a', ['banner' => $middleBanners[1]])
                @include('includes.middlebanner1b', ['banner' => $middleBanners[2]])
            </div>
        </div>
    </section>
    <!-- End Small Banner -->

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach ($mainCategoriesList as $cat)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->first) active @endif"
                                            data-toggle="tab" href="#tabs-{{ Str::slug($cat->title) }}"
                                            role="tab">{{ $cat->title }}</a>
                                    </li>
                                @endforeach

                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content" id="myTabContent">
                            @foreach ($mainCategoriesList as $cat)
                                <!-- Start Single Tab -->
                                <div class="tab-pane fade show @if ($loop->first) active @endif"
                                    id="tabs-{{ Str::slug($cat->title) }}" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            @foreach ($productsTrendingItem[$cat->id] as $product)
                                                @include(
                                                    'includes/catalog-product-cart'
                                                )
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Single Tab -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Midium Banner  -->
    <section class="midium-banner">
        <div class="container">
            <div class="row">
                @include('includes.middlebanner2', ['banner' => $middleBanners[3]])
                @include('includes.middlebanner2', ['banner' => $middleBanners[4]])
            </div>
        </div>
    </section>
    <!-- End Midium Banner -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Hot Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach ($productsHotItem as $product)
                            @include('includes/product-cart')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>On sale</h1>
                            </div>
                        </div>
                    </div>
                    @foreach ($productsOnSale as $product)
                        @include('includes/product-cart-simple')
                    @endforeach
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Best Seller</h1>
                            </div>
                        </div>
                    </div>
                    @foreach ($productsBestSeller as $product)
                        @include('includes/product-cart-simple')
                    @endforeach
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Top viewed</h1>
                            </div>
                        </div>
                    </div>
                    @foreach ($productsTopViewed as $product)
                        @include('includes/product-cart-simple')
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Home List  -->

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="/images/370x300.png" alt="#">
                        <div class="content">
                            <p class="date">22 July , 2020. Monday</p>
                            <a href="#" class="title">Sed adipiscing ornare.</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="/images/370x300.png" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Man’s Fashion Winter Sale</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="/images/370x300.png" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Women Fashion Festive</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->

    <!-- Start Shop Services Area -->
    @include('includes.servicesarea')
    <!-- End Shop Services Area -->

    <!-- Start Shop Newsletter  -->
    @include('includes.newsletter')
    <!-- End Shop Newsletter -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 offset-lg-3 col-12">
                            <h4
                                style="margin-top:100px;font-size:14px; font-weight:500; color:#F7941D; display:block; margin-bottom:5px;">
                                Eshop Free Lite</h4>
                            <h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.
                                <h3>
                                    <p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">
                                        Please, purchase full version of the template to get all pages, features and
                                        commercial license</p>
                                    <div class="button" style="margin-top:30px;">
                                        <a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/"
                                            target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
