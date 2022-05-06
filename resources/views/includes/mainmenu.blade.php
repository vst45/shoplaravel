<nav class="navbar navbar-expand-lg">
    <div class="navbar-collapse">
        <div class="nav-inner">
            <ul class="nav main-menu menu navbar-nav">
                <li class="active"><a href="{{ route('index') }}">Home</a></li>

                <li><a href="{{ route('siteCatalog') }}">Catalog<i class="ti-angle-down"></i></a>
                    <ul class="dropdown">

                        @foreach ($mainCategoriesList as $category)
                            <li><a
                                    href="{{ route('siteCatalog', ['category' => $category->slug]) }}">{{ $category->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li><a href="#">Menu...</a></li>
                <li><a href="#">Menu...</a></li>
                <li><a href="#">Menu...</a></li>
                <li><a href="#">Menu...</a></li>
                <li><a href="#">Menu...</a></li>
{{--


                <li><a href="#">Service</a></li>

                <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                    <ul class="dropdown">
                        <li><a href="{{ route('siteCart') }}">Cart</a></li>
                        <li><a href="{{ route('siteCheckout') }}">Checkout</a></li>
                    </ul>
                </li>
                <li><a href="#">Pages</a></li>
                <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="{{ route('blogIndex') }}">Blog Single Sidebar</a>
                        </li>
                    </ul>
                </li> --}}
                <li><a href="{{ route('siteContact') }}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
