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
                        <h4 class="text-themecolor">All Units deposit</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">deposit</li>
                            </ol>
                        <a href="{{route('deposit.create')}}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New</a>
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
                                <h4 class="card-title">Properties Table</h4>
                                {{-- <h6 class="card-subtitle">Data table example</h6> --}}
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Amount</th>
                                                <th>Date Paid</th>
                                                <th>Unit Name</th>
                                                <th>Tenant Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($deposits as $deposit)

                                            <tr>
                                            <td>{{$deposit->amount}}</td>
                                            <td>{{$deposit->date}}</td>
                                            <td>{{$deposit->unit->name}}</td>
                                            <td>{{ $deposit->user->name }}</td>
                                            <td class="row">
                                            <a href="{{route('deposit.show',$deposit->id)}}" class=" btn btn btn-info" >More</a>
                                            <a href="{{route('deposit.edit',$deposit->id)}}" style="margin-left: 4%;margin-right:4;" class=" btn btn btn-warning" >Edit</a>
                                            </td>
                                            </tr>
                                            @endforeach
                                                <thead>
                                                    <tr>
                                                        <th>Amount</th>
                                                        <th>Date Paid</th>
                                                        <th>Unit Name</th>
                                                        <th>Tenant Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                        </tbody>
                                    </table>
                                </div>
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


@endsection
