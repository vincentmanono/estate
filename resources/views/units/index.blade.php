@extends('layouts.admin')
@section('content')

<!-- ============================================================== -->
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
                <h4 class="text-themecolor">Blank Page</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">All Units Records</h4>
                                                        {{-- <h6 class="card-subtitle">Data table example</h6> --}}
                                                        <a href="{{ route('home') }}"class="btn btn-primary" style="float: right;" >  Back</a>
                                                        <div class="table-responsive m-t-40">
                                                            <table id="myTable" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Water Meter</th>
                                                                        <th>Electricity Meter</th>
                                                                        <th>Billing Cycle</th>
                                                                        <th>Property Name</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($units as $unit)

                                                                    <tr>
                                                                    <td>{{$unit->name}}</td>
                                                                    <td>{{$unit->water_acc_no}}</td>
                                                                    <td>{{$unit->electricity_acc_no}}</td>
                                                                    <td>{{ $unit->billing_cycle }}</td>
                                                                    <td>{{$unit->property->name}}</td>
                                                                    <td class="row">
                                                                        <a class="btn btn-info " href="{{ route('unit.show',$unit->id) }}" data-toggle="tooltip" title="View"> <i class="ti-eye"></i> View</a>
                                                                        <a style="margin-left: 2%;margin-right:2%; " class="btn btn-success " href="{{ route('unit.edit',$unit->id) }}" data-toggle="tooltip" title="Edit"> <i class="ti-marker-alt"></i>Edit</a>

                                                                    </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Water Meter</th>
                                                                            <th>Electricity Meter</th>
                                                                            <th>Billing Cycle</th>
                                                                            <th>Property Name</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    {{--  {{ $units->links() }}  --}}
                                                </div>
                                              </div>
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
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->

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
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
@endsection
