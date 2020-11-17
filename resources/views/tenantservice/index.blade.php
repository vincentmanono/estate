@extends('layouts.admin')

@section('title')
    <title> Tenant services Request</title>
@stop

@section('content')

    <!-- ============================================================== -->
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
                    <h4 class="text-themecolor">Tenant services Request </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Requests</li>
                        </ol>
                        {{-- <a type="button" href="{{ route('property.create') }}"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
                        --}}
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
                                            <h4 class="card-title">Tenant services Request</h4>
                                            {{-- <h6 class="card-subtitle">Data table example
                                            </h6> --}}
                                            <a href="{{ route('home') }}" class="btn btn-primary" style="float: right;">
                                                Back</a>
                                            <div class="table-responsive m-t-40">
                                                <table id="myTable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Property</th>
                                                            <th>Unit</th>
                                                            <th>Service</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if (Auth::user()->isOwner() || Auth::user()->isTenant())

                                                            @include('tenantservice/allTenantRequests',['services'=>$services])

                                                        @else

                                                            @foreach ($properties as $property)
                                                                @include('tenantservice/allTenantRequests',['services'=>$property->tenantServicesRequests])
                                                            @endforeach


                                                        @endif



                                                        <thead>
                                                            <tr>
                                                                <th>Property</th>
                                                                <th>Unit</th>
                                                                <th>Service</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        {{-- {{ $propertys->links() }}
                                        --}}
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

@section('extraScripts')
    <script>
        $("#deleteService").on("submit",(e)=>{


            if(confirm("Are you sure you need to delete this service request ?")){
                return true ;
            }else{
                return false;
            }
        })
    </script>
@stop

