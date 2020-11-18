@extends('layouts.admin')

@section('title')
    <title> Chief Properties -{{ $param }} </title>
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
                    <h4 class="text-themecolor">All Units water</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">water</li>
                        </ol>
                        <a href="{{ route('water.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                                class="fa fa-plus-circle"></i> Add New</a>
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
                            <h4 class="card-title">Waters Table</h4>
                            {{-- <h6 class="card-subtitle">Data table example</h6>
                            --}}
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Unit Name</th>
                                            <th>Property Name</th>
                                            <th>Amount</th>
                                            <th>No of Months</th>
                                            <th>Read Date </th>
                                            <th>New Reading</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (Auth::user()->isOwner())
                                            @include('waters.showAllWaterBillings',['waters'=>$waters])
                                        @elseif(Auth::user()->isManager())

                                            @foreach ($properties as $property)

                                                @foreach ($property->units as $unit)
                                                    @include('waters.showAllWaterBillings',['waters'=>$unit->waters])

                                                @endforeach


                                            @endforeach
                                        @else

                                            @foreach ($leases as $lease)
                                                @include('waters.showAllWaterBillings',['waters'=>$lease->unit->waters])
                                            @endforeach


                                        @endif




                                        <thead>
                                            <tr>

                                                <th>Unit Name</th>
                                                <th>Property Name</th>
                                                <th>Amount</th>
                                                <th>No of Months</th>
                                                <th>Read Date </th>
                                                <th>New Reading</th>
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
