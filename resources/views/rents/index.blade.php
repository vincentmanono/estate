@extends('layouts.admin')

@section('title')
    <title> {{ $param }} </title>
@stop
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
                    @if (Auth::user()->type == 'tenant')
                        <h4 class="text-themecolor">Unit Rents</h4>
                    @else
                        <h4 class="text-themecolor">All Units Rent</h4>
                    @endif
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Rent</li>
                        </ol>
                        @if (Auth::user()->isManager() || Auth::user()->isOwner())

                            <a href="{{ route('rent.create') }}" type="button"
                                class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New</a>
                        @endif
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
                            {{-- <h6 class="card-subtitle">Data table example</h6>
                            --}}
                            <a class="btn btn-primary btn sm" style="float:right;" href="{{ route('home') }}">Back</a>
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
                                        @if (Auth::user()->isTenant() || Auth::user()->isOwner())

                                            @foreach ($rents as $rent)
                                                @include('rents/showAllRents',['rent'=>$rent])
                                            @endforeach

                                        @else
                                            @foreach ($properties as $property)

                                                @foreach ($property->units as $unit)
                                                    @foreach ($unit->rents as $rent)
                                                        @include('rents/showAllRents',['rent'=>$rent])

                                                    @endforeach

                                                @endforeach


                                            @endforeach



                                        @endif
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
