@extends('frontend.includes.app')
@section('main-content')
    <!-- Hero Section Begin -->

    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('frontend/img/hero/gym1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#" class="primary-btn">Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="{{ asset('frontend/img/hero/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#" class="primary-btn">Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Why chose us?</span>
                        <h2>PUSH YOUR LIMITS FORWARD</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>Modern equipment</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            dolore facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>Healthy nutrition plan</h4>
                        <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>Proffesponal training plan</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            dolore facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>Unique to your needs</h4>
                        <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

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
                @foreach ($class as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="class-item">
                            <div class="ci-pic">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                            <div class="ci-text">
                                <span>{{ $item->title }}</span>
                                <h5>{{ $item->subtitle }}</h5>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="{{ asset('frontend/img/banner-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>registration now to get more deals</h2>
                        <div class="bt-tips">Where health, beauty and fitness meet.</div>
                        <a href="#" class="primary-btn  btn-normal">Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2>Choose your pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        @php
                            $data = '1';
                        @endphp
                        <h3>Class drop-in</h3>
                        <div class="pi-price">
                            <h2>$ 39.0</h2>
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>Free riding</li>
                            <li>Unlimited equipments</li>
                            <li>Personal trainer</li>
                            <li>Weight losing classes</li>
                            <li>Month to mouth</li>
                            <li>No time restriction</li>
                        </ul>

                        @if (Auth::guard('user')->user())

                            @foreach ($select_plan as $item)
                            @endforeach

                            @if (Auth::guard('user')->user()->id != $item->user_id)
                                <form action="{{ route('plan.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="1" name="selected_plan">
                                    <input type="hidden" value="{{ Auth::guard('user')->user()->id }}" name="user_id">
                                    <button type="submit" class="primary-btn pricing-btn">Enroll now</button>
                                </form>
                            @else
                                @foreach ($select_plan as $item)
                                @endforeach
                                @if ($item->user_id == Auth::guard('user')->user()->id)
                                    @if ($item->selected_plan == $data)
                                        <a href="{{ route('select1') }}" type="submit"
                                            class="primary-btn pricing-btn">Selected Package</a>
                                    @else
                                        <form action="{{ route('plan.upgrade', $item->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="1" name="selected_plan">
                                            <input type="hidden" value="{{ Auth::guard('user')->user()->id }}"
                                                name="user_id">
                                            <button type="submit" class="primary-btn pricing-btn">Upgrade</button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('plan.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="1" name="selected_plan">
                                        <input type="hidden" value="{{ Auth::guard('user')->user()->id }}" name="user_id">
                                        <button type="submit" class="primary-btn pricing-btn">Enroll now</button>
                                    </form>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('plan.error') }}" class="primary-btn pricing-btn">Enroll now</a>
                        @endif
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        @php
                            $data = '2';
                        @endphp
                        <h3>12 Month unlimited</h3>
                        <div class="pi-price">
                            <h2>$ 99.0</h2>
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>Free riding</li>
                            <li>Unlimited equipments</li>
                            <li>Personal trainer</li>
                            <li>Weight losing classes</li>
                            <li>Month to mouth</li>
                            <li>No time restriction</li>
                        </ul>

                        @if (Auth::guard('user')->user())

                            @foreach ($select_plan as $item)
                            @endforeach

                            @if (Auth::guard('user')->user()->id != $item->user_id)
                                <form action="{{ route('plan.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="2" name="selected_plan">
                                    <input type="hidden" value="{{ Auth::guard('user')->user()->id }}" name="user_id">
                                    <button type="submit" class="primary-btn pricing-btn">Enroll now</button>
                                </form>
                            @else
                                @foreach ($select_plan as $item)
                                @endforeach
                                @if ($item->user_id == Auth::guard('user')->user()->id)
                                    @if ($item->selected_plan == $data)
                                        <a href="{{ route('select2') }}" type="submit"
                                            class="primary-btn pricing-btn">Selected Package</a>
                                    @else
                                        <form action="{{ route('plan.upgrade', $item->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="2" name="selected_plan">
                                            <input type="hidden" value="{{ Auth::guard('user')->user()->id }}"
                                                name="user_id">
                                            <button type="submit" class="primary-btn pricing-btn">Upgrade</button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('plan.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="2" name="selected_plan">
                                        <input type="hidden" value="{{ Auth::guard('user')->user()->id }}"
                                            name="user_id">
                                        <button type="submit" class="primary-btn pricing-btn">Enroll now</button>
                                    </form>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('plan.error') }}" class="primary-btn pricing-btn">Enroll now</a>
                        @endif

                        {{-- <a href="" class="primary-btn pricing-btn">Enroll now</a> --}}
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        @php
                            $data = '3';
                        @endphp
                        <h3>6 Month unlimited</h3>
                        <div class="pi-price">
                            <h2>$ 59.0</h2>
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>Free riding</li>
                            <li>Unlimited equipments</li>
                            <li>Personal trainer</li>
                            <li>Weight losing classes</li>
                            <li>Month to mouth</li>
                            <li>No time restriction</li>
                        </ul>
                        @if (Auth::guard('user')->user())
                            @foreach ($select_plan as $item)
                            @endforeach
                            @if (Auth::guard('user')->user()->id != $item->user_id)
                                <form action="{{ route('plan.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="3" name="selected_plan">
                                    <input type="hidden" value="{{ Auth::guard('user')->user()->id }}" name="user_id">
                                    <button type="submit" class="primary-btn pricing-btn">Enroll now</button>
                                </form>
                            @else
                                @foreach ($select_plan as $item)
                                @endforeach
                                @if ($item->user_id == Auth::guard('user')->user()->id)
                                    @if ($item->selected_plan == $data)
                                        <a href="{{ route('select3') }}" type="submit"
                                            class="primary-btn pricing-btn">Selected Package</a>
                                    @else
                                        <form action="{{ route('plan.upgrade', $item->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="3" name="selected_plan">
                                            <input type="hidden" value="{{ Auth::guard('user')->user()->id }}"
                                                name="user_id">
                                            <button type="submit" class="primary-btn pricing-btn">Upgrade</button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('plan.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="3" name="selected_plan">
                                        <input type="hidden" value="{{ Auth::guard('user')->user()->id }}"
                                            name="user_id">
                                        <button type="submit" class="primary-btn pricing-btn">Enroll now</button>
                                    </form>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('plan.error') }}" class="primary-btn pricing-btn">Enroll now</a>
                        @endif
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Gallery Section Begin -->
    <div class="pricing-section">
<h3 style="color:white;">Gallery Section</h3><br>

    </div>
    <div class="gallery-section" style="height:595.994px !important;">
        <div class="gallery">
            <div class="grid-sizer"></div>
            {{-- @foreach ($gallerys as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="gs-item grid-wide set-bg">

                        <a href="{{ asset($item->image) }}" class=""><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            @endforeach --}}
            <div class="row">
                @foreach ($gallerys as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="class-item">
                            <div class="ci-pic">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                            <div class="gs-item grid-wide set-bg"
                                style="background-image:url('{{ asset($item->image) }}');">
                                <a href="{{ asset($item->image) }}"><i class="fa fa-picture-o"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
    <!-- Gallery Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Our Team</span>
                            <h2>TRAIN WITH EXPERTS</h2>
                        </div>
                        <a href="#" class="primary-btn btn-normal appoinment-btn">appointment</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ts-slider owl-carousel">
                    @foreach ($trainers as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="class-item">
                                <div class="ci-pic">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                                <div class="ci-text">
                                    <span>{{ $item->name }}</span>
                                    <h5>{{ $item->post }}</h5>
                                    <h5>Trainer Fee: ${{ $item->fee }}</h5>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->
    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Suggested Product</span>
                            <h2>Suggested Product via price</h2>
                        </div>
                        <a href="#" class="primary-btn btn-normal appoinment-btn">Suggested Product</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ts-slider owl-carousel">
                    @foreach ($suggest_product as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="class-item">
                                <div class="ci-pic">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                                <div class="ci-text">
                                    <span>{{ $item->title }}</span>
                                    <h5>{{ $item->price }}</h5>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-map-marker"></i>
                        <p>333 Middle Winchendon Rd, Rindge,<br /> NH 03461</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>125-711-811</li>
                            <li>125-668-886</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>Support.gymcenter@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->
@endsection
