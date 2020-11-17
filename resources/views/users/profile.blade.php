@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor"> Profile </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                        {{-- <button type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                            New</button> --}}
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-7 offset-2 ">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="/storage/users/{{ $user->image }}" class="img-circle"
                                    width="150" />
                                <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                <h6 class="card-subtitle">{{ $user->type }}</h6>

                            </center>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>{{ $user->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                            <h6>{{ $user->address }}</h6>
                            <small class="text-muted p-t-30 db">KRA Number </small>
                            <h6>{{ $user->kra_pin }}</h6>
                            <small class="text-muted p-t-30 db">ID Number </small>
                            <h6>{{ $user->id_no }}</h6>

                            <small class="text-muted p-t-30 db">Number of Units Leased </small>
                            <h6>{{ $user->leases->count() }}</h6>
                            <hr>
                            <a name="" id="" class="btn btn-primary" href="{{ route('editUser',auth()->user()->id) }}" role="button">Update profile</a>

                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->

            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    </div>
@stop
