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
                                <li class="breadcrumb-item"><a href="{{ route('view.contact') }}">CONTACT</a></li>
                                <li class="breadcrumb-item active">LIST CONTACT</li>
                            </ul>
                            <!-- BEGIN #datatable -->
                            <div id="datatable" class="mb-5">
                                <a href="{{ route('add.contact') }}" class="btn btn-outline-theme float-end"><i class='bx bx-loader bx-spin text-theme fw-bold'></i>Add Contact</a>
                                <h4 class="mb-3">CONTACT LIST<i class='bx bx-loader bx-spin text-theme fw-bold'></i></h4>
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
                                            @foreach($contacts as $key => $contact)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td><img class="img-thumbnail" width="30px" height="40px" src="{{ (!empty($contact->image))? url('upload/contact_images/'.$contact->image) : url('upload/no_image.jpg') }}" alt="Contact Image"></td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->mobile }}</td>
                                                <td class="@empty($contact->job_title)? td-color @endempty">{{ (!empty($contact->job_title))? $contact->job_title : "Not Found"}}</td>
                                                <td class="@empty($contact->company)? td-color @endempty">{{ (!empty($contact->company))? $contact->company : "Not Found"}}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td class="@empty($contact->dob)? td-color @endempty">{{ (!empty($contact->dob))? date('d-M-Y',strtotime($contact->dob)) : "Not Found"}}</td>
                                                <td class="@empty($contact->address)? td-color @endempty">{{ (!empty($contact->address))? $contact->address : "Not Found"}}</td>
                                                <td class="@empty($contact->note)? td-color @endempty">{{ (!empty($contact->note))? $contact->note : "Not Found"}}</td>
                                                <td>
                                                    <a href="{{ route('edit.contact',$contact->id) }}" class="btn btn-outline-info">Edit</a>
                                                    <a href="{{ route('delete.contact',$contact->id) }}" class="btn btn-outline-danger">Delete</a>
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
