@extends('layouts.site')

@section('title', 'Catalog. Search result')

@section('content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('index') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"> <a href="{{ route('siteCatalog') }}">Catalog</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container">
        <h2 class="page-title">Search result</h2>
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
                                        @if (!count($products))
                                            Not found
                                        @else
                                            @foreach ($products as $product)
                                                @include(
                                                    'includes/catalog-product-cart'
                                                )
                                            @endforeach
                                        @endif
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

@endsection
