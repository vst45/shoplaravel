@extends('layouts.site')

@section('title', 'WishList')

@section('content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">WishList</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container">
        <h2 class="page-title">WishList</h2>
    </div>

    <!-- wishlist Cart -->
    <div class="wishlist section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody id="wishlist_content"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ End wishlist Cart -->

    <!-- Start Shop Services Area  -->
    @include('includes.servicesarea')
    <!-- End Shop Newsletter -->

    <!-- Start Shop Newsletter  -->
    @include('includes.newsletter')
    <!-- End Shop Newsletter -->


    <script>
        const PAGE = 'wishlist';

        const generateWishList = (wishlist) => {

            let list = '';

            for (const key in wishlist.products) {

                const product = wishlist.products[key]

                list = list +
                    `
                    <tr><td class="image" data-title="No"><img src="/images/100x100.png" alt="${product.name}"></td>
                    <td class="product-des" data-title="Description"><p class="product-name"><a href="/product/${product.slug}">${product.name}</a></p></td>
                    <td class="price" data-title="Price">` +
                    (product.price != product.actual_price ?
                        `<span class="old-price">$${format_price(product.price)}</span>` : '') +
                    `<span>$${format_price(product.actual_price)}</span></td>
                    <td class="action" data-title="Remove"><a href="#" onClick="removeItemFromWishList(${product.id}); return false"><i class="ti-trash remove-icon"></i></a></td></tr>
                    `
            }

            $('#wishlist_content').html(list)
        }

        const refreshWishList = () => {
            $.ajax({
                type: 'POST',
                url: '{{ route('siteGetWishlist') }}',
                async: false,
                data: {
                    wishlist: getLocalStorageWishList()
                },
                success: function(data) {
                    generateWishList(data)
                }
            });
        }
    </script>

@endsection

@section('bottom')

    <script>
        $(document).ready(function() {
            refreshWishList()
        });
    </script>

@endsection
