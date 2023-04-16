@extends('frontend.includes.app')
@section('main-content')
    <section class="services1-single">
        <div class="container-c">
            <div class="single-img">
                <img src="./image/fewa.jpg" />
            </div>
            <div class="about-text">
                <h4 class="ev">{{ $blog_single->title }}</h4>

                <p class="fewapara">{{ $blog_single->desription }}.</p>

            </div>
        </div>
    </section>
@endsection
