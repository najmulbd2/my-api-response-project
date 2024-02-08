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
                                <li class="breadcrumb-item"><a href="#">CONTACT</a></li>
                                <li class="breadcrumb-item active">ADD CONTACT</li>
                            </ul>
                            <!-- BEGIN #formControls -->
                            <div id="formControls" class="mb-5">
                                <h4>Add Contact<i class='bx bx-loader bx-spin text-theme fw-bold'></i></h4>
                                <div class="card">
                                    <div class="card-body pb-2">
                                        <form action="{{ route('store.contact') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Person Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="person name"/>
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Job Title</label>
                                                        <input type="text" class="form-control" name="job_title" id="exampleFormControlInput1" placeholder="job title" />
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Company Name</label>
                                                        <input type="text" class="form-control" name="company" id="exampleFormControlInput1" placeholder="company name" />
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Email<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="email" />
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Mobile<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="mobile" id="exampleFormControlInput1" placeholder="mobile" />
                                                        @error('mobile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Date of Birth</label>
                                                        <input type="text" name="dob" class="form-control" id="datepicker" placeholder="dd/mm/yyyy" />
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">Address</label>
                                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" placeholder="address"></textarea>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">Note</label>
                                                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3" placeholder="type your any note here..."></textarea>
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
