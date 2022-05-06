@extends('layouts.site')

@section('title', 'Catalog.' . $category->title)

@section('content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('index') }}">Home<i class="ti-arrow-right"></i></a></li>
                            @foreach ($breadCrumbs as $item)
                                <li @if ($item['last']) class="active" @endif>
                                    <a href="{{ route('siteCatalog', ['category' => $item['slug']]) }}">{{ $item['title'] }}
                                        @if (!$item['last'])
                                            <i class="ti-arrow-right"></i>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container">
        <h2 class="page-title">Catalog. {{ $category->title }}</h2>
    </div>

    <!-- Start Product Area -->
    <div class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-info">

                        <div class="tab-content">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active">
                                <div class="tab-single">
                                    <div class="row">

                                        @foreach ($categoriesList as $item)
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('siteCatalog', ['category' => $item->slug]) }}">
                                                            <img class="default-img" src="/images/100x100.png" alt="#">
                                                            <img class="hover-img" src="/images/100x100.png" alt="#">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a
                                                                href="{{ route('siteCatalog', ['category' => $item->slug]) }}">{{ $item->title }}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-info">

                        <div class="tab-content">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active">
                                <div class="tab-single">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            @include('includes/catalog-product-cart')
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Area -->

        <div class="container product-pagination">
            {{ $products->withQueryString()->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>

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
