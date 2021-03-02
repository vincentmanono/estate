@extends('layouts.admin')
@section('title')
<title> Chief Properties -Branch-Create-Edit</title>
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
                        <h4 class="text-themecolor">Branch Page</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Branch Page</li>
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

                                @if ($param == 'EditBranch')

                                <!-- Start Page Content -->
                <!-- ============================================================== -->




                <!-- Row -->
                <div class="row" style="margin-left:10%">

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Branch</h4>
                                <form class="form pt-3" action="{{ route('update.branch',$branch->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" required class="form-control" value="{{ $branch->name}}" name="name" placeholder="Name" aria-label="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Branch Status</label>
                                        <div class="input-group mb-3">
                                            <input required type="text" class="form-control" value="{{ $branch->status}}" name="status" placeholder="Active/Inactive" aria-label="Email">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <a type="submit" class="btn btn-dark" href="{{ route('allBranches') }}">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End Page Content -->

                                @elseif($param == 'CreateBranch')
<!-- ============================================================== -->




                <!-- Row -->
                <div class="row" style="margin-left:10%">

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Branch</h4>
                                <form class="form pt-3" action="{{ route('store.branch') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" required  class="form-control" name="name" placeholder="Name" aria-label="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                            <div class="form-group">
                                                <label class="control-label">Branch</label>
                                                <select required class="form-control custom-select" name="status" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>

                                                </select>

                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Create</button>
                                    <a type="submit" class="btn btn-dark" href="{{ route('allBranches') }}">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                                @endif


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
                <!-- .right-sidebar -->
            </div>
        </div>
            </div>
        </div>

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
