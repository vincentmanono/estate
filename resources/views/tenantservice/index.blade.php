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
                    <h4 class="text-themecolor">Tenant requests</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">request</li>
                        </ol>
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

                            <!-- Start Page Content -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Start Page Content -->
                                            <!-- ============================================================== -->
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">requests Table</h4>
                                                            {{-- <h6 class="card-subtitle">Data table example
                                                            </h6> --}}
                                                            <div style="float: right">
                                                                <a class="btn btn-sm btn-primary" href="{{ route('home') }}">Back</a>
                                                            </div>
                                                            <div class="table-responsive m-t-40">
                                                                <table id="myTable" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Property Name</th>
                                                                            <th>Unit Name</th>
                                                                            <th>Tenant Name</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @if (Auth::user()->isOwner() || Auth::user()->isTenant())
                                                                        @include('tenantservice.alltenantservice',['requests'=>$requests])
                                                                    @else

                                                                        @foreach ($properties as $property)
                                                                            @include('tenantservice.alltenantservice',['requests'=>$property->requests])
                                                                        @endforeach


                                                                    @endif


                                                                    </tbody>
                                                                    <tfoot>
                                                                        <th>Property Name</th>
                                                                        <th>Unit Name</th>
                                                                        <th>Tenant Name</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- ============================================================== -->
                                            <!-- End PAge Content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- End PAge Content -->


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
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>

@endsection


