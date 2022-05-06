@extends('layouts.site')

@section('title', 'CheckOut')

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="post" action="#" id="form_checkout">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p></p>
                            <!-- Form -->

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>First Name<span>*</span></label>
                                        <input type="text" name="fname" placeholder="" required111="required111">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Last Name<span>*</span></label>
                                        <input type="text" name="lname" placeholder="" required111="required111">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required111="required111">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number<span>*</span></label>
                                        <input type="text" name="phone" placeholder="" required111="required111">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address<span>*</span></label>
                                        <input type="text" name="address" placeholder="" required111="required111">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Postal Code<span>*</span></label>
                                        <input type="text" name="post" placeholder="" required111="required111">
                                    </div>
                                </div>
                            </div>

                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        {{-- <li>Sub Total<span>$330.00</span></li>
                                    <li>(+) Shipping<span>$10.00</span></li> --}}
                                        <li {{-- class="last" --}}>Total<span id="checkout_amount_total">$0.00</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="ml-4 mt-3">
                                        @foreach ($payments as $item)
                                            <label for="payment{{ $item->title }}"><input name="payment_id"
                                                    id="payment{{ $item->title }}" value="{{ $item->id }}"
                                                    type="radio" @if ($loop->first) checked @endif>
                                                {{ $item->title }}</label><br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="/images/payment-method.png" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button class="btn btn-primary">proceed to checkout</button>
                                    </div>
                                    <div class="button mt-3">
                                        <a href="{{ route('siteCart') }}" class="btn">return to cart</a>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    @include('includes.servicesarea')
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->
    @include('includes.newsletter')
    <!-- End Shop Newsletter -->
@endsection

@section('bottom')
    <script>
        const formCheckout = $("#form_checkout")

        formCheckout.submit(function(event) {
            event.preventDefault();

            $(".field-error-text").remove()

            const data = {
                fname: $("#form_checkout input[name*='fname']").val(),
                lname: $("#form_checkout input[name*='lname']").val(),
                email: $("#form_checkout input[name*='email']").val(),
                phone: $("#form_checkout input[name*='phone']").val(),
                address: $("#form_checkout input[name*='address']").val(),
                post: $("#form_checkout input[name*='post']").val(),
                payment_id: $("#form_checkout input[name*='payment_id']:checked").val(),
                basket: getBasketArrayRequestData(),
                _token: '{{ csrf_token() }}'
            }

            console.log(data)

            $.getJSON({
                type: 'POST',
                url: '{{ route('siteOrderStore') }}',
                async: false,
                data: data,
                success: function(data) {
                    localStorage.setItem('basket', JSON.stringify({}))
                    alert('saved')
                    location.href = "{{ route('index') }}"
                },
                error: function(data) {

                    alert('error')

                    errors = data.responseJSON.errors

                    for (const field in errors) {
                        $("#form_checkout [name*='" + field + "']").after(
                            '<div class="field-error-text">' + errors[field] + "</div>"
                        )
                    }
                }
            });

            return false;
        });
    </script>
@endsection
