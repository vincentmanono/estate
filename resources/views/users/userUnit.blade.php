@extends('layouts.admin')

@section('title')
    <title> Tenant Unit Lease </title>
@stop


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
                    <h4 class="text-themecolor"> {{ auth()->user()->name }} </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tenant Unit</li>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h4 class="m-b-0 text-white"> Unit Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-body">
                                                    <h3 class="box-title">Unit Details</h3>
                                                    <hr class="m-t-0 m-b-40">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3">Unit
                                                                    Number:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> {{ $unit->name }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3">water Acc
                                                                    number :</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">
                                                                        {{ $unit->water_acc_no }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3"> billing
                                                                    cycle:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">
                                                                        {{ $unit->billing_cycle }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3">water
                                                                    meter:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">{{ $unit->water_meter }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3">Monthly
                                                                    Rent:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> {{ $unit->rent }} </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3">
                                                                    electricity meter:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">
                                                                        {{ $unit->electricity_meter }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3">
                                                                    electricity Acc No:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">
                                                                        {{ $unit->electricity_acc_no }} </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-3">service
                                                                    charge:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">
                                                                        {{ $unit->service_charge }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>

                                                    <!--/row-->
                                                    <h3 class="box-title">Unit Billings </h3>
                                                    <hr class="m-t-0 m-b-40">
                                                    <div class="row">

                                                        <div class="card col-md-12 ">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Rent Table</h4>
                                                                <h6 class="card-subtitle">Monthly rent for {{ $unit->name }}
                                                                </h6>
                                                                <div class="table-responsive m-t-40">
                                                                    <table id="myTable"
                                                                        class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Paid</th>
                                                                                <th>expiry</th>
                                                                                <th>Status</th>
                                                                                <th>Description</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach ($unit->rents as $rent)
                                                                                <tr>
                                                                                    <td>{{ $rent->paid_date }}</td>
                                                                                    <td>{{ $rent->expiry_date }}</td>
                                                                                    <td>
                                                                                        @if ($rent->status)
                                                                                        <span class="badge badge-pill badge-success">Active</span>
                                                                                    @else
                                                                                        <span class="badge badge-pill badge-danger">Used </span>
                                                                                    @endif
                                                                                    </td>
                                                                                    <td>{{ Str::of($rent->description)->limit(60, '...') }}
                                                                                    </td>

                                                                                    <td>#</td>
                                                                                </tr>
                                                                            @endforeach




                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                                {{-- water --}}

                                                <div class="row">

                                                    <div class="card col-md-12 ">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Water Table</h4>
                                                            <h6 class="card-subtitle">Monthly water bill for
                                                                {{ $unit->name }}</h6>
                                                            <div class="table-responsive m-t-40">
                                                                <table id="myTable"
                                                                    class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Amount To Pay</th>
                                                                            <th>Pay Date</th>
                                                                            <th>Read Date</th>
                                                                            <th>previous reading</th>
                                                                            <th>New Reading</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @foreach ($unit->waters as $water)
                                                                            <tr>
                                                                                <td>KSH {{ number_format($water->amount)  }}</td>
                                                                                <td>{{ $water->pay_date }}</td>
                                                                                <td>{{ $water->read_date }}</td>
                                                                                <td>{{ number_format( $water->previous_reading ) }}</td>
                                                                                <td>{{ number_format( $water->new_reading ) }}</td>
                                                                                <td>

                                                                                    @if ($water->paid)
                                                                                        <span class="badge badge-pill badge-success">Paid</span>
                                                                                    @else
                                                                                        <span class="badge badge-pill badge-danger">Not Paid</span>
                                                                                    @endif

                                                                                </td>
                                                                            </tr>

                                                                        @endforeach
                                                                        <tr>
                                                                            <td class="text text-capitalize " colspan="3" >Total Amount expected to Pay </td>
                                                                            <td class=" text text-danger" colspan="3" >KSH {{ number_format($unPaidWaterBilling) }}</td>
                                                                        </tr>
                                                                    <tfoot>

                                                                        <tr>
                                                                            <th>Amount To Pay</th>
                                                                            <th>Pay Date</th>
                                                                            <th>Read Date</th>
                                                                            <th>previous reading</th>
                                                                            <th>New Reading</th>
                                                                            <th>Status</th>
                                                                        </tr>

                                                                    </tfoot>






                                                                    </tbody>
                                                                </table>

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
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
@stop
