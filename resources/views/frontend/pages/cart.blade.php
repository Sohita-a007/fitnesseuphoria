@extends('frontend.includes.app')
@section('main-content')
    <section class="about">
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <h2>About us</h2>
                            <div class="bt-option">
                            <a href="{{route('index')}}">Home</a>
                                <span>Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100"
                                            height="100" class="img-responsive" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{ $details['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}"
                                    class="form-control quantity cart_update" min="1" />
                            </td>
                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i>
                                    Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <h3><strong>Total ${{ $total }}</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/product') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue
                            Shopping</a>

                        {{-- <form action="{{ route('checkout') }}" method="POST">
                            @csrf

                            <input type="text" name="user_id" value="1">

                            <button type="submit" class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>

                        </form> --}}
                        @if (Auth::guard('user')->user())
                            <a href="{{ route('checkout') }}" class="btn btn-success"><i class="fa fa-money"></i>
                                Checkout</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success"><i class="fa fa-money"></i>
                                Login To Checkout</a>
                        @endif

                    </td>
                </tr>
            </tfoot>
        </table>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(".cart_update").change(function(e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: '{{ route('update_cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            $(".cart_remove").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm("Do you really want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>

    @endsection
