@extends('admin.includes.app')
@section('main-content')
    <div class="content-wrapper">


        <!-- /.card-header -->
        <!-- form start -->
        <div class="card">
            <div class="card-header">


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Product Name</th>
                            <th>Order By</th>
                            <th>Price</th>
                            <th>Order Date</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>

                                <td>

                                    @foreach ($data as $data_item)
                                        {{ $data_item }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->user->name }}
                                </td>
                                <td>{{ $item->price }}
                                </td>

                                <td>{{ $item->created_at }}
                                </td>




                            </tr>
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
