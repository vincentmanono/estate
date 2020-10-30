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
                    <h4 class="text-themecolor">Unit Details</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Unit Information</li>
                        </ol>


                        <form action="{{ route('unit.destroy', $unit->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');"
                                class="btn btn-danger d-none d-lg-block m-l-15"><i class="fa fa-minus-circle"></i>
                                Delete</button>

                        </form>


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
                            <a style="float: right" href="{{ route('unit.edit', $unit->id) }}"
                                class="btn btn-sm btn-info">Edit Unit</a>
                            <!-- row -->
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Lease Information</h5>
                                                <div class="table-responsive">
                                                    <table class="table no-border">
                                                        <tbody class="text-dark">
                                                            @if ($unit->leased != null)
                                                                <tr>
                                                                    <td>Lease Status</td>
                                                                    <td>{{ $unit->leased->status ? 'Leased' : 'Expired' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Date Leased</td>
                                                                    <td>{{ date('F d, Y', strtotime($unit->leased->date)) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tenant Name</td>
                                                                    <td>{{ $unit->leased->user->name }}</td>
                                                                </tr>
                                                            @endif








                                                        </tbody>
                                                    </table>

                                                </div>
                                                Lease Agreement Document View
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- column -->
                                <div class="col-lg-8">
                                    <!-- Property Items -->
                                    <div class="card">
                                        <!-- row -->
                                        <div class="row no-gutters">
                                            <div class="col-md-4"
                                                style="background: url('../assets/images/property/prop1.jpeg') center center / cover no-repeat; min-height:250px;">
                                                <span class="pull-right label label-danger">For Rent</span>
                                            </div>
                                            <!-- column -->
                                            <div class="col-md-8">
                                                <!-- Row -->
                                                <div class="row no-gutters">
                                                    <!-- column -->
                                                    <div class="col-md-6 border-right border-bottom">
                                                        <div class="p-20">

                                                            <h5 class="card-title">Unit Name</h5>
                                                            <h5>{{ $unit->name }}</h5>
                                                            <h5 class="card-title">Poperty Name</h5>
                                                            <h5>{{ $unit->property->name }}</h5>

                                                        </div>
                                                    </div>
                                                    <!-- column -->
                                                    <div class="col-md-6 border-bottom">
                                                        <div class="p-20">
                                                            <div class="d-flex no-block align-items-center">
                                                                <span><img
                                                                        src="{{ asset('/assets/images/property/pro-bath.png') }}"></span>
                                                                <span class="p-10 text-muted">Bathrooms</span>
                                                                {{-- <span
                                                                    class="badge badge-pill badge-secondary ml-auto">{{ $unit->floor->sitting }}</span>
                                                                --}}
                                                            </div>
                                                            <div class="d-flex no-block align-items-center">
                                                                <span><img src="/assets/images/property/pro-bed.png"></span>
                                                                <span class="p-10 text-muted">Beds</span>
                                                                <span
                                                                    class="badge badge-pill badge-secondary ml-auto">2</span>
                                                            </div>
                                                            <div class="d-flex no-block align-items-center">
                                                                <span><img
                                                                        src="../assets/images/property/pro-garage.png"></span>
                                                                <span class="p-10 text-muted">Garages</span>
                                                                <span
                                                                    class="badge badge-pill badge-secondary ml-auto">1</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column -->
                                                    <div class="col-md-12" style="margin-left: 4%">
                                                        <h4 class="card-title">Meter No Information </h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">Water</h5>
                                                                <h5>{{ $unit->water_acc_no }}</h5>
                                                                <h5 class="card-title">Electricity</h5>
                                                                <h5>{{ $unit->electricity_acc_no }}</h5>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <h5 class="card-title">Billing Cycle</h5>
                                                                <h5>{{ $unit->billing_cycle }}</h5>
                                                                <h5 class="card-title">Rent </h5>
                                                                <h5>Ksh {{ number_format($unit->rent) }}</h5>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <h5 class="card-title">Unit Status</h5>
                                                                <h5>{{ $unit->status ? 'Leased' : 'Vacant' }}</h5>


                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">Service Charge</h5>
                                                                <h5>{{ $unit->service_charge }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- Property Items -->

                                </div>
                            </div>
                            <!-- /row -->
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="card-title">Tenant Information</h4>

                                    <hr>



                                    <div class="card-body">


                                        @if ($unit->status && $unit->leased != null)
                                            <center class="m-t-30">
                                                <img src="/assets/images/users/agent.jpg" class="img-circle" width="150" />
                                                <h4 class="card-title m-t-10">{{ $unit->leased->user->name }}</h4>
                                                <h4 class="card-title m-t-10">Phone</h4>
                                                <h6 class="card-subtitle"> <a style="color: blue"
                                                        href="tel:{{ $unit->leased->user->phone }}">{{ $unit->leased->user->phone }}</a>
                                                </h6>
                                                <h5 class="card-title">Email Address</h5>


                                                <h6 class="card-subtitle"> <a style="color: blue"
                                                        href="mailto:{{ $unit->leased->user->email }}">{{ $unit->leased->user->email }}</a>
                                                </h6>


                                            </center>
                                        @else

                                        @endif

                                    </div>
                                    <hr>



                                </div>
                                <div class="col-md-9">

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
                                                                    <h4 class="card-title">Unit Rent Records</h4>
                                                                    {{-- <h6
                                                                        class="card-subtitle">Data table example</h6>
                                                                    --}}
                                                                    <div style="float: right">
                                                                        <a class="btn btn-sm btn-primary"
                                                                            href="{{ route('unit.index') }}">Back</a>
                                                                    </div>
                                                                    <div class="table-responsive m-t-40">
                                                                        <table id="myTable"
                                                                            class="table table-bordered table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>AMOUNT</th>
                                                                                    <th>PAID DATE</th>
                                                                                    <th>EXPIRY DATE</th>
                                                                                    <th>DESCRIPTION</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($rents as $rent)


                                                                                    <tr>
                                                                                        <td>{{ number_format($rent->amount) }}
                                                                                        </td>
                                                                                        <td> {{ date('F d, Y', strtotime($rent->paid_date)) }}
                                                                                        </td>
                                                                                        <td>{{ date('F d, Y', strtotime($rent->expiry_date)) }}
                                                                                        </td>
                                                                                        <td>{{ Str::of($rent->description)->limit(40) }}
                                                                                        </td>

                                                                                    </tr>



                                                                                @endforeach


                                                                            </tbody>
                                                                            <tfoot>

                                                                                <th>AMOUNT</th>
                                                                                <th>EXPIRY DATE</th>
                                                                                <th>EXPIRY DATE</th>
                                                                                <th>DESCRIPTION</th>

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













                                </div>
                            </div>











                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

@endsection
