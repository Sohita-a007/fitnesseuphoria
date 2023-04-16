@extends('admin.includes.app')
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <ul>
                <li>
                    @foreach ($items as $item)
                        {{ $item->name }}= {{ $item->total }}
                    @endforeach
                </li>
            </ul>
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->

    </div>
@endsection