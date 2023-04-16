<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="fa fa-close"></i>
    </div>
    <div class="canvas-search search-switch">
        <i class="fa fa-search"></i>
    </div>
    <nav class="canvas-menu mobile-menu">
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('classes') }}">Classes</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            {{-- <li><a href="{{ route('team') }}">Our Team</a></li> --}}
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('product') }}">Product</a></li>
            @if (Auth::guard('user')->user())
                <li><a href="#">{{ Auth::guard('user')->user()->name }}</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif


        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="canvas-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img src={{ asset('frontend/img/logo.jpg') }} style="height: 80px;
    width: 84px;
    border-radius: 50%;
    margin-top: -32%;">
    <p style="font-size:16px;">Fitness Euphoria</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <nav class="nav-menu">
                    <ul>
                        <li class="active"><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('classes') }}">Classes</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        {{-- <li><a href="{{ route('team') }}">Our Team</a></li> --}}
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('product') }}">Product</a></li>

                        @if (Auth::guard('user')->user())
                            <li><a href="#">{{ Auth::guard('user')->user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>

                    <div class="dropdown">
                        <button type="button"class="btn btn-secondary dropdown-toggle" type="button"
                            style="margin-left: 82%;margin-top: -6%; " id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false"></i> Cart <span
                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                            style="overflow:hidden;width: 50%;
                           margin-left: 60%">
                            <div class="row total-header-section">
                                @php $total = 0 @endphp
                                @foreach ((array) session('cart') as $id => $details)
                                    @php
                                        // dd($details);
                                    @endphp
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                </div>
                            </div>
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ $details['photo'] }}" />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['product_name'] }}</p>
                                            <span class="price text-info"> ${{ $details['price'] }}</span> <span
                                                class="count"> Quantity:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
