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
                                <li class="breadcrumb-item active">Edit CONTACT</li>
                            </ul>
                            <!-- BEGIN #formControls -->
                            <div id="formControls" class="mb-5">
                                <h4>Edit Contact <i class='bx bx-loader bx-spin text-theme fw-bold'></i></h4>
                                <div class="card">
                                    <div class="card-body pb-2">
                                        <form action="{{ route('update.user',$editData->user_id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Person Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{ $editData['user']['name'] }}" placeholder="person name" />
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Job Title</label>
                                                        <input type="text" class="form-control" name="job_title" id="exampleFormControlInput1" value="{{ (!empty($editData->job_title))? $editData->job_title : "Not Found"}}" placeholder="job title" />
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Company Name</label>
                                                        <input type="text" class="form-control" name="company" id="exampleFormControlInput1" value="{{ (!empty($editData->company))? $editData->company : "Not Found"}}" placeholder="company name" />
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Email<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{ $editData['user']['email'] }}" placeholder="email" />
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Mobile<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="mobile" id="exampleFormControlInput1" value="{{ $editData->mobile }}" placeholder="mobile" />
                                                        @error('mobile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Date of Birth</label>
                                                        <input type="text" name="dob" class="form-control" id="datepicker" value="{{ (!empty($editData->dob))? date('d-M-Y',strtotime($editData->dob)) : "Not Found"}}" placeholder="dd/mm/yyyy" />
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">Address</label>
                                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" placeholder="address">{{ (!empty($editData->address))? $editData->address : "Not Found"}}</textarea>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">Note</label>
                                                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3" placeholder="type your any note here...">{{ (!empty($editData->note))? $editData->note : "Not Found"}}</textarea>
                                                    </div>

                                                    <div class="form-group mb-2">
                                                        <label class="form-label" for="exampleFormControlFile1">Image</label>
                                                        <input type="file" name="image" class="form-control" id="exampleFormControlFile1" />
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <img class="img-thumbnail" width="90px" height="100px" src="{{ (!empty($editData->image))? url('upload/user_images/'.$editData->image) : url('upload/no_image.jpg') }}" alt="Contact Image">
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-outline-theme"><i class='bx bx-loader bx-spin text-theme fw-bold'></i>Update</button>
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
