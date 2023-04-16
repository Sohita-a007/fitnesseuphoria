@extends('frontend.includes.app')
@section('main-content')
    <section class="about">
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <h2>Product</h2>
                            <div class="bt-option">
                                 <a href="{{route('index')}}">Home</a>
                                <span>Product</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div> --}}

        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="dropdown">
                        <button type="button"class="btn btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> Cart <span
                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
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
                </div>
            </div>
        </div> --}}
        <!-- Breadcrumb Section End -->


        <!-- Classes Section Begin -->
        <section class="classes-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Our Classes</span>
                            <h2>WHAT WE CAN OFFER</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-lg-4 col-md-6">

                            <div class="class-item">
                                <div class="ci-pic">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                                <div class="ci-text">
                                    <span>{{ $item->title }}</span>
                                    <h5>{{ $item->title }}</h5>

                                    <a href="{{ route('product.single', $item->id) }}"><i class="fa fa-angle-right"></i></a>
                                </div>

                                <a href="{{ route('add_to_cart', $item->id) }}" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- ChoseUs Section End -->


    </section>
@endsection
