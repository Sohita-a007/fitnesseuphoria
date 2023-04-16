@extends('frontend.includes.app')
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>6 Month unlimited</h2>
                        <div class="bt-option">
                             <a href="{{route('index')}}">Home</a>
                            <span>6 Month unlimited</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>6 Month unlimited</h2>
                <ul class="list-group">
                    <li class="list-group-item ">Premium Package</li>
                    <li class="list-group-item">Access to gym equipment</li>
                    <li class="list-group-item">Locker room access</li>
                    <li class="list-group-item">Shower facilities</li>
                    <li class="list-group-item">Fitness classes</li>
                    <li class="list-group-item">Personal training sessions</li>
                    <li class="list-group-item">Nutrition consultations</li>
                    <li class="list-group-item">Sauna and steam room access</li>

                </ul>
            </div>
        </div>
    </div>
@endsection
