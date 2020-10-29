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
                        <h4 class="text-themecolor">All Units Rent</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">Rent</li>
                            </ol>
                        <a href="{{route('rent.create')}}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New</a>
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
                                <h4 class="card-title">Rents Table</h4>
                                {{-- <h6 class="card-subtitle">Data table example</h6> --}}
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Property Name</th>
                                                <th>Unit Name</th>
                                                <th>Amount</th>
                                                <th>Date Paid</th>
                                                <th>Expiry Date</th>
                                                <th>Tenant Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($rents as $rent)

                                            <tr>

                                            <td>{{$rent->unit->name}}</td>
                                            <td>{{ $rent->unit->property->name }}</td>
                                            <td>{{$rent->amount}}</td>
                                            <td>{{$rent->paid_date}}</td>
                                            <td>{{$rent->expiry_date}}</td>
                                            <td>{{ $rent->user->name }}</td>
                                            <td class="row">

                                            <a href="{{route('rent.edit',$rent->id)}}" style="margin-left: 4%;margin-right:4%; margin-bottom:4%; " class=" btn btn-info" >Edit</a>

                                            <form action="{{ route('rent.destroy',$rent->id) }}" enctype="multipart/form-data" method="post">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class=" btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>

                                            </form>
                                            </td>
                                            </tr>
                                            @endforeach
                                                <thead>
                                                    <tr>
                                                        <th>Property Name</th>
                                                        <th>Unit Name</th>
                                                        <th>Amount</th>
                                                        <th>Date Paid</th>
                                                        <th>Expiry Date</th>
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
