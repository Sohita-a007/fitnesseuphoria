@extends('admin.includes.app')

<style>
    .alert {
        color: red;
    }

    .thumb-image {
        float: left;
        width: 100px;
        position: relative;
        padding: 5px;
        height: 100px;
    }
</style>
@section('main-content')
    <div class="content-wrapper">
        <div class="card card-primary">
            <div class="card-title ml-4 mt-4">
                <h3 class="card-title">Blog Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="category"> Category Name</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category"
                            id="category" placeholder="Enter Category Name" value="{{ old('category') }}">

                        @error('category')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
