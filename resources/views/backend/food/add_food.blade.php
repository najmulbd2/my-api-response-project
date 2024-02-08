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
                                <li class="breadcrumb-item"><a href="#">FOOD</a></li>
                                <li class="breadcrumb-item active">ADD FOOD</li>
                            </ul>
                            <!-- BEGIN #formControls -->
                            <div id="formControls" class="mb-5">
                                <h4>Add Food<i class='bx bx-loader bx-spin text-theme fw-bold'></i></h4>
                                <div class="card">
                                    <div class="card-body pb-2">
                                        <form action="{{ route('store.food') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">


                                                    <div class="form-group mb-3">
                                                        <select name="month" class="form-select">
                                                            <option>Select Month</option>
                                                            {{ $last= date('m')-11 }}
                                                            {{ $now = date('m') }}
                                                            {{ $year = date('Y') }}
                                                            @for ($i = $now; $i >= $last; $i--)
                                                                <option value="{{ $i.'-'.$year }}">{{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Food Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="food name"/>
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Price</label>
                                                        <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="price" />
                                                        @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Description</label>
                                                        <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="description" />
                                                        @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlFile1">Image</label>
                                                        <input type="file" name="image" class="form-control" id="exampleFormControlFile1" />
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-outline-theme"><i class='bx bx-loader bx-spin text-theme fw-bold'></i>Add Now</button>
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
