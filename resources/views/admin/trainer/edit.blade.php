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
                <h3 class="card-title">Trainer Edit Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.trainer.update', $trainer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div id="wrapper" style="margin-top: 20px;"><input id="fileUpload" name="image"
                                    type="file" />
                                <div id="image-holder"></div>
                            </div>
                        </div>

                        @error('image')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Trainer Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Enter Trainer Name" value="{{ $trainer->name }}">


                        @error('name')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Trainer Description</label>
                        {{-- <input type="number" class="form-control @error('rent_price') is-invalid @enderror"
                            name="rent_price" id="title" placeholder="Enter Rent Price"> --}}
                        <textarea class="form-control" name="description" id="" cols="20" rows="10"
                            placeholder="Enter Trainer Description">{{ $trainer->description }}</textarea>


                        @error('description')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="post">Post</label>
                        <input type="text" class="form-control @error('post') is-invalid @enderror" name="post"
                            id="post" placeholder="Enter Post" value="{{ $trainer->post }}">


                        @error('post')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fee">Fee</label>
                        <input type="number" class="form-control @error('fee') is-invalid @enderror" name="fee"
                            id="fee" placeholder="Enter Fee" value="{{ $trainer->fee }}">


                        @error('fee')
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#fileUpload").on('change', function() {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);
                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            });
        });
    </script>
@endsection
