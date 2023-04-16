@extends('admin.includes.app')
@section('main-content')
    <div class="content-wrapper">


        <!-- /.card-header -->
        <!-- form start -->
        <div class="card">
            {{-- <div class="card-header">
                <a href="{{ route('admin.trainer.create') }}" class="btn btn-primary " style="float: right;">Add New</a>

            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Message</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>

                                <td>{{ $item->name }}
                                </td>
                                <td>{{ $item->email }}
                                </td>
                                <td>{{ $item->number }}
                                </td>
                                <td>{{ $item->message }}
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
