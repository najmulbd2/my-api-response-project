@extends('admin.master_admin');
@section('content')

    <!-- BEGIN #content -->
    <div id="content" class="app-content">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN row -->
            <div class="row justify-content-center">
                <!-- BEGIN col-10 -->
                <div class="col-xl-12">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-9 -->
                        <div class="col-xl-11">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('view.food') }}">FOOD</a></li>
                                <li class="breadcrumb-item active">LIST FOOD</li>
                            </ul>
                            <!-- BEGIN #datatable -->
                            <div id="datatable" class="mb-5">
                                <a href="{{ route('add.food') }}" class="btn btn-outline-theme float-end"><i class='bx bx-loader bx-spin text-theme fw-bold'></i>Add Product</a>
                                <h4 class="mb-3">FOOD LIST<i class='bx bx-loader bx-spin text-theme fw-bold'></i></h4>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatableDefault" class="table text-nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allData as $key => $value )
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td><img class="img-thumbnail" width="30px" height="40px" src="{{ (!empty($value->image))?  url('upload/food_images/'.$value->image) : url('upload/no_image.jpg') }}" alt="Food Image"></td>
                                                    <td>৳ {{ $value->price }}</td>
                                                    <td>{{ $value->description }}</td>
                                                    <td>
                                                        <a href="{{ route('edit.food',$value->id) }}" class="btn btn-outline-info">Edit</a>
                                                        <a href="#" class="btn btn-outline-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #datatable -->
                        </div>
                        <!-- END col-9-->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END col-10 -->
            </div>
            <!-- END row -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #content -->
@endsection
