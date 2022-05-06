<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                        <li><i class="ti-email"></i> support@shophub.com</li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-7 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main">
                        {{-- <li><i class="ti-location-pin"></i> Store location</li>
                        <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> --}}
                        @auth
                            <li><i class="ti-user"></i> <a href="{{ route('siteAccount') }}">My account</a> ({{ Auth::user()->name }})</li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </form>
                            </li>
                        @else
                            <li><i class="ti-power-off"></i><a href="{{ route('login') }}">Login</a></li>
                        @endauth




                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
