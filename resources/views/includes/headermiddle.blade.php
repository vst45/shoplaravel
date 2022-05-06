<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('index') }}"><img src="/images/logo.png" alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <!-- Search Form -->
                <div class="search-top">
                    <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <form class="search-form" method="GET" action="{{ route('productSearch') }}">
                            <input type="text" placeholder="Search here..." name="name"  value="{{ isset($_GET['name'])? $_GET['name'] : '' }}">
                            <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
                <!--/ End Search Form -->
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="search-bar-top">
                    <div class="search-bar">
                        <form method="GET" action="{{ route('productSearch') }}">
                            <select name="category_id">
                                <option value="0">All Category</option>
                                @foreach ($mainCategoriesList as $category)
                                    <option value="{{ $category->id }}" {!! (isset($_GET['category_id']) && $_GET['category_id'] == $category->id)? 'selected="selected"' : '' !!}>{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <input name="name" placeholder="Search Products Here....." type="search" value="{{ isset($_GET['name'])? $_GET['name'] : '' }}">
                            <button class="btnn" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    <!-- Search Form -->
                    <div class="sinlge-bar">
                        <a href="{{ route('siteWishlist') }}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    </div>
                    {{-- <div class="sinlge-bar">
                        <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                    </div> --}}
                    <div class="sinlge-bar shopping">
                        <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"
                                id="num_basket_item">0</span></a>
                        <!-- Shopping Item -->
                        <div class="shopping-item">
                            <div class="dropdown-cart-header">
                                <span>--</span>
                                <a href="{{ route('siteCart') }}">View Cart</a>
                            </div>
                            <ul class="shopping-list">
                            </ul>
                            <div class="bottom">
                                <div class="total">
                                    <span>Total</span>
                                    <span class="total-amount basket-popup-amount"></span>
                                </div>
                                <a href="{{ route('siteCheckout') }}" class="btn animate">Checkout</a>
                            </div>
                        </div>
                        <!--/ End Shopping Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
