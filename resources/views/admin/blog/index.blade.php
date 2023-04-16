@extends('admin.includes.app')
@section('main-content')
    <div class="content-wrapper">


        <!-- /.card-header -->
        <!-- form start -->
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary " style="float: right;">Add New</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="" height="100" width="100">
                                </td>
                                <td>{{ $item->title }}
                                </td>
                                <td>{{ $item->description }}
                                </td>
                                <td>{{ $item->price }}
                                </td>
                                <td>{{ $item->created_at }}
                                </td>


                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M120 256c0 30.9-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56zm160 0c0 30.9-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56zm104 56c-30.9 0-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56s-25.1 56-56 56z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu mr-5" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('admin.blog.edit', $item->id) }}">Edit
                                            </a>

                                            <a class="dropdown-item"
                                                href="{{ route('admin.blog.delete', $item->id) }}">Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
