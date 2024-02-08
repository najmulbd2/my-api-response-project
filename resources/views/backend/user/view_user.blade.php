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
                                <li class="breadcrumb-item"><a href="{{ route('view.user') }}">USERS</a></li>
                                <li class="breadcrumb-item active">LIST USER</li>
                            </ul>
                            <!-- BEGIN #datatable -->
                            <div id="datatable" class="mb-5">
                                <a href="{{ route('add.user') }}" class="btn btn-outline-theme float-end"><i class='bx bx-loader bx-spin text-theme fw-bold'></i>Add User</a>
                                <h4 class="mb-3">USER LIST<i class='bx bx-loader bx-spin text-theme fw-bold'></i></h4>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatableDefault" class="table text-nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Job Title</th>
                                                <th>Company</th>
                                                <th>Email</th>
                                                <th>Date of Birth</th>
                                                <th>Address</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $key => $user)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><img class="img-thumbnail" width="30px" height="40px" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }}" alt="Contact Image"></td>
                                                    <td>{{ $user['user']['name'] }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td class="@empty($user->job_title)? td-color @endempty">{{ (!empty($user->job_title))? $user->job_title : "Not Found"}}</td>
                                                    <td class="@empty($user->company)? td-color @endempty">{{ (!empty($user->company))? $user->company : "Not Found"}}</td>
                                                    <td>{{ $user['user']['email'] }}</td>
                                                    <td class="@empty($user->dob)? td-color @endempty">{{ (!empty($user->dob))? date('d-M-Y',strtotime($user->dob)) : "Not Found"}}</td>
                                                    <td class="@empty($user->address)? td-color @endempty">{{ (!empty($user->address))? $user->address : "Not Found"}}</td>
                                                    <td class="@empty($user->note)? td-color @endempty">{{ (!empty($user->note))? $user->note : "Not Found"}}</td>
                                                    <td>
                                                        <a href="{{ route('edit.user',$user->user_id) }}" class="btn btn-outline-info">Edit</a>
                                                        <a href="{{ route('delete.user',$user->user_id) }}" class="btn btn-outline-danger">Delete</a>
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
