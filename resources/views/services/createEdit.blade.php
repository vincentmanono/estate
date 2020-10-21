@extends('layouts.admin')
@section('content')

<!-- Page wrapper  -->
<!-- ============================================================== -->
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
                <h4 class="text-themecolor">Service</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Service </li>
                    </ol>
                    {{--  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>  --}}
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


            <div class="col-lg-9" style="margin-left: 15%">
                <div class="card">
                  @if ($param == 'Add Service')

                  <div class="card-body">
                    <h4 class="card-title">Add New Service Provider </h4>
                    {{--  <h6 class="card-subtitle">Us Bootstraps predefined grid classes for horizontal form</h6>  --}}
                    <form class="form-horizontal p-t-20" enctype="multipart/form-data" action="{{ route('service.store') }}" method="post">

                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="uname" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" placeholder="name">
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email2" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email2" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email2" class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="type" placeholder="Type" >
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9 ">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                            </div>
                        </div>
                    </form>
                </div>

                  @elseif($param == 'Edit Service')

                  <div class="card-body">
                    <h4 class="card-title">Add New Service Provider </h4>
                    {{--  <h6 class="card-subtitle">Us Bootstraps predefined grid classes for horizontal form</h6>  --}}
                    <form class="form-horizontal p-t-20" enctype="multipart/form-data" action="{{ route('service.update',$service->id) }}" method="post">

                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="uname" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="{{ $service->name }}" placeholder="name">
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email2" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" value="{{ $service->email }}" placeholder="Email">
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email2" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $service->phone }}" name="phone" placeholder="Phone">
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email2" class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $service->type }}" name="type" placeholder="Type" >
                                    <div class="input-group-append"><span class="input-group-text"><i class=""></i></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9 ">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                  @endif
                </div>
            </div>
        </div>
        <!-- Row -->


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

@endsection
