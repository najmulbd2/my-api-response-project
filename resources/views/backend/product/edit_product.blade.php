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
                                <li class="breadcrumb-item"><a href="#">PRODUCT</a></li>
                                <li class="breadcrumb-item active">UPDATE PRODUCT</li>
                            </ul>
                            <!-- BEGIN #formControls -->
                            <div id="formControls" class="mb-5">
                                <h4>Update Product<i class='bx bx-loader bx-spin text-theme fw-bold'></i></h4>
                                <div class="card">
                                    <div class="card-body pb-2">
                                        <form action="{{ route('update.product',$editData->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Product Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{ $editData->name }}"/>
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Price</label>
                                                        <input type="number" class="form-control" name="price" id="exampleFormControlInput1" value="{{ $editData->price }}" />
                                                        @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Description</label>
                                                        <input type="text" class="form-control" name="description" id="exampleFormControlInput1" value="{{ $editData->description }}" />
                                                        @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlFile1">Image</label>
                                                        <input type="file" name="image" class="form-control mb-2" id="exampleFormControlFile1" />
                                                        <img class="img-thumbnail" width="100px" height="80px" src="{{ (!empty($editData->image))? url('upload/product_images/'.$editData->image) : url('upload/no_image.jpg') }}" alt="Image">
                                                    </div>



                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-outline-theme"><i class='bx bx-loader bx-spin text-theme fw-bold'></i>Update Now</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #formControls -->
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
