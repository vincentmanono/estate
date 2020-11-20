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

                        <h4 class="text-themecolor">Properties monthly rent tax</h4>

                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">taxs</li>
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
                            <h4 class="card-title">Properties monthly rent tax</h4>
                            {{-- <h6 class="card-subtitle">Data table example</h6>
                            --}}
                            <a class="btn btn-primary btn sm" style="float:right;" href="{{ route('home') }}">Back</a>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Branch</th>
                                            <th>Property</th>
                                            <th>Total Rent</th>
                                            <th>Tax</th>
                                            <th>Date taken</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ( Auth::user()->isOwner())

                                            @foreach ($taxs as $tax)
                                                @include('taxs.showAllTaxs',['tax'=>$tax ])
                                            @endforeach

                                        @else
                                            @foreach ($properties as $property)

                                            @foreach ($property->taxs as $tax)
                                            @include('taxs.showAllTaxs',['tax'=>$tax ])
                                                @endforeach


                                            @endforeach



                                        @endif
                                        <thead>
                                            <tr>
                                                <th>Branch</th>
                                                <th>Property</th>
                                                <th>Total Rent</th>
                                                <th>Tax</th>
                                                <th>Date taken</th>
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


