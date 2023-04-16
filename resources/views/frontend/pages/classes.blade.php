@extends('frontend.includes.app')
@section('main-content')
    <section class="about">
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <h2>Classes</h2>
                            <div class="bt-option">
                            <a href="{{route('index')}}">Home</a>
                                <span>Classes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                    @foreach ($class as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="class-item">
                                <div class="ci-pic">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                                <div class="ci-text">
                                    <span>{{ $item->title }}</span>
                                    <h5>{{ $item->subtitle }}</h5>
                                    <a href="{{ route('classes.single', $item->id) }}"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- ChoseUs Section End -->


    </section>
@endsection
