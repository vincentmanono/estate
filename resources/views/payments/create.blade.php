@extends('layouts.admin')
@section('title')
<title> Chief Properties -Payment Add</title>
@endsection

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
                        <h4 class="text-themecolor">Payment Page</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Payment </li>
                            </ol>
                            {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> --}}
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">





                <!-- Row -->
                <div class="row" style="margin-left:10%">

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Payment Mode</h4>
                                <form class="form pt-3" action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                    <div class="form-group">
                                        <label>Payment Type</label>
                                        <div class="input-group mb-3">
                                            <input type="text"  class="form-control" name="type" placeholder="Type" aria-label="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                            <div class="form-group">
                                                <label class="control-label">Number</label>
                                                <input type="text"  class="form-control" name="number" placeholder="Number" aria-label="Username">

                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Create</button>
                                    <a type="submit" class="btn btn-dark" href="{{ route('payment.index') }}">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End Page Content -->


                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->

@endsection
