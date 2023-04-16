@extends('frontend.includes.app')
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>About us</h2>
                    <div class="bt-option">
                    <a href="{{route('index')}}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('main-content')
    <section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-area">
                        <form action="{{ route('place.order') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="checkout-left">
                                        <div class="panel-group" id="accordion">
                                            @if (Auth::guard('user')->user())
                                                <input type="hidden" name="user_id"
                                                    value="{{ Auth::guard('user')->user()->id }}">
                                            @endif
                                            @php $total = 0 @endphp
                                            @foreach ((array) session('cart') as $id => $details)
                                                @php
                                                    // dd($details);
                                                @endphp
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                            {{-- <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                            </div> --}}
                                            <input type="hidden" name="price" value="{{ $total }}">


                                            <!-- Billing Details -->
                                            <div class="panel panel-default aa-checkout-billaddress">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="" data-parent="#accordion" href="#">
                                                            Billing Details
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="" class="panel-collapse ">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="First Name" name="firstname"><br>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Last Name" name="lastname"><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="email" class="form-control"
                                                                        placeholder="Email Address" name="email"><br>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="tel" class="form-control"
                                                                        placeholder="Phone" name="phone"><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Address" name="address"><br>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="City" name="city"><br>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="checkout-right">
                                            {{-- @foreach ($products as $product) --}}
                                            <h4>Payment Method</h4>
                                            <div class="aa-payment-method">
                                                {{-- <label for="cashdelivery"><input type="radio" id="cashdelivery"
                                                        name="optionsRadios"> Cash on Delivery </label>
                                                <label for="paypal"><input type="radio" id="paypal"
                                                        name="optionsRadios" checked> Via Paypal </label> --}}
                                                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg"
                                                    alt="PayPal Acceptance Mark">

                                            </div>
                                            {{-- @endforeach --}}


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" value="Place Order" class="aa-browse-btn">Place
                                order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
