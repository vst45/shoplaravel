@extends('layouts.site')

@section('title', 'Cart')

@section('content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody id="cart_content"></tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">

                                <div class="left">
                                    <div class="coupon">
                                        {{-- <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form> --}}
                                    </div>
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">
                                            Shipping (+10$)</label> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul id="cart_total_box">
                                        <li>Cart Subtotal<span>$0.00</span></li>
                                        {{-- <li>Shipping<span>Free</span></li> --}}
                                        <li>You Save<span>$0.00</span></li>
                                        <li class="last">You Pay<span>$0.00</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="{{ route('siteCheckout') }}" class="btn">Checkout</a>
                                        <a href="{{ route('siteCatalog') }}" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    @include('includes.servicesarea')
    <!-- End Shop Newsletter -->

    <!-- Start Shop Newsletter  -->
    @include('includes.newsletter')
    <!-- End Shop Newsletter -->

    {{-- <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick
            Shop</span></a> --}}

    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="/images/modal1.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="/images/modal2.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="/images/modal3.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="/images/modal4.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Flared Shift Dress</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                    </div>
                                </div>
                                <h3>$29.00</h3>
                                <div class="quickview-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad
                                        impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo
                                        ipsum numquam.</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option selected="selected">s</option>
                                                <option>m</option>
                                                <option>l</option>
                                                <option>xl</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            <select>
                                                <option selected="selected">orange</option>
                                                <option>purple</option>
                                                <option>black</option>
                                                <option>pink</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Add to cart</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Modal end -->

    <script>
        const PAGE = 'cart';

        const generateBasketCart = (basketList) => {

            let list = '';

            for (const key in basketList.products) {

                const product = basketList.products[key]

                list = list +
                    `
                    <tr><td class="image" data-title="No"><img src="/images/100x100.png" alt="${product.name}"></td>
                    <td class="product-des" data-title="Description"><p class="product-name"><a href="/product/${product.slug}">${product.name}</a></p></td>
                    <td class="price" data-title="Price"><span id="box_price_${product.id}">$0</span></td>
                    <input type="hidden" id="price_${product.id}" value="${product.price}">
                    <input type="hidden" id="actualprice_${product.id}" value="${product.actual_price}">
                    <td class="qty" data-title="Qty"><div class="input-group"><div class="button minus">
                    <button type="button" class="btn btn-primary btn-number" data-type="minus" onClick="basketItemQuantityMinus(${product.id})"><i class="ti-minus"></i></button></div>
                    <input type="text" id="quantity_${product.id}" name="quant[]" class="input-number" value="${product.quantity}" onKeyUp="basketCalculateAmount()">
                    <div class="button plus">
                    <button type="button" class="btn btn-primary btn-number" data-type="plus" onClick="basketItemQuantityPlus(${product.id})"><i class="ti-plus"></i></button>
                    </div></div></td>
                    <td class="total-amount order-cart-amount" data-title="Total"><span id="box_amount_${product.id}">***</span></td>
                    <td class="action" data-title="Remove"><a href="#" onClick="removeItemFromBasket(${product.id}); return false"><i class="ti-trash remove-icon"></i></a></td></tr>
                    `
            }

            $('#cart_content').html(list)

            basketCalculateAmount()
        }
    </script>

@endsection

@section('bottom')

    <script>
        const basketItemQuantityPlus = (id) => {

            const new_quantity = parseInt($('#quantity_' + id).val(), 10) + 1

            $('#quantity_' + id).val(new_quantity)
            updateLocalStorageBasket(id, new_quantity)
            basketCalculateAmount()
        }

        const basketItemQuantityMinus = (id) => {

            const old_quantity = parseInt($('#quantity_' + id).val(), 10)

            if (old_quantity > 1) {
                $('#quantity_' + id).val(old_quantity - 1)
                updateLocalStorageBasket(id, old_quantity - 1)
            }

            basketCalculateAmount()
        }

        const basketCalculateAmount = () => {

            const basket = getLocalStorageBasket()
            let total_actual_amount = 0
            let total_amount = 0
            let total_box = ''

            for (const key in basket) {
                const quantity = parseInt($('#quantity_' + key).val(), 10)
                const actual_price = parseInt($('#actualprice_' + key).val(), 10)
                const price = parseInt($('#price_' + key).val(), 10)

                const amount = price * quantity
                const actual_amount = actual_price * quantity

                total_amount += amount
                total_actual_amount += actual_amount

                $('#box_price_' + key).html(
                    (price != actual_price ? `<span class="old-price">$${format_price(price)}</span>` : "") +
                    `$${format_price(actual_price)}`)

                $('#box_amount_' + key).html(
                    (price != actual_price ? `<span class="old-price">$${format_price(amount)}</span>` : "") +
                    `$${format_price(actual_amount)}`)


                total_box = `<li class="last">You Pay<span>$${format_price(total_actual_amount)}</span></li>`

                if (total_amount != total_actual_amount)
                    total_box = `
                        <li>Cart Subtotal<span>$${format_price(total_amount)}</span></li>
                        {{-- <li>Shipping<span>Free</span></li> --}}
                        <li>You Save<span>$${format_price(total_amount - total_actual_amount)}</span></li>
                        ` + total_box

                $('#cart_total_box').html(total_box)

            }
        }
    </script>

@endsection
