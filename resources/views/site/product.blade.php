@extends('layouts.site')

@section('title', 'Catalog.' . $product->name)

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
        <h2 class="page-title">{{ $product->name }}</h2>
    </div>

    <!-- Start Product Area -->
    <div class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-info text-center">

                        <div class="card m-3 text-center border-white">
                            <img src="/images/550x750.png" style="max-width:300px" class="card-img-top mx-auto" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h3 class="card-title">
                                    @if ($product->sale_percent)
                                        <span class="old-price">${{ format_price($product->price) }}</span>
                                    @endif
                                    ${{ format_price($product->actual_price) }}
                                </h3>
                                <p class="card-text">{{ $product->brand->title }}</p>
                                <p class="card-text">{{ $product->description }}</p>
                                <a href="#" class="btn btn-add-to-basket" style="color: white; margin: 40px"
                                    data-id="{{ $product->id }}">Add to cart</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- End Product Area -->
    </div>

@endsection
