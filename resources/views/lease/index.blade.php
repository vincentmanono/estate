@extends('layouts.admin')

@section('title')
    <title>Chief Properties -{{ $param }}</title>
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
                    <h4 class="text-themecolor">Lease List</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Lease</li>
                        </ol>
                        @if (Auth::user()->isOwner() || Auth::user()->isManager())
                            @can('create', App\Lease::class)
                                <a type="button" href="{{ route('lease.create') }}"
                                    class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                                    New</a>
                            @endcan



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












                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">lease Table</h4>
                                                            {{-- <h6 class="card-subtitle">
                                                                Data table example</h6> --}}
                                                            <a href="{{ route('home') }}" class="btn btn-primary"
                                                                style="float: right;"> Back</a>
                                                            <div class="table-responsive m-t-40">
                                                                <table id="myTable"
                                                                    class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>

                                                                            <th>Property</th>
                                                                            <th>Unit</th>
                                                                            <th>Tenant</th>
                                                                            <th>Status</th>
                                                                            <th>Lease Form</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @if (Auth::user()->isOwner() || Auth::user()->isTenant())
                                                                            @include('lease.showAllLease',['leases'=>$leases])
                                                                        @else

                                                                            @foreach ($properties as $property)
                                                                                @include('lease.showAllLease',['leases'=>$property->leases])
                                                                            @endforeach


                                                                        @endif


                                                                        <thead>
                                                                            <tr>

                                                                                <th>Property</th>
                                                                                <th>Unit</th>
                                                                                <th>Tenant</th>
                                                                                <th>Status</th>
                                                                                <th>Lease Form</th>
                                                                                <th>Action</th>

                                                                            </tr>
                                                                        </thead>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                        {{-- {{ $leases->links() }}
                                                        --}}
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
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->


@endsection
