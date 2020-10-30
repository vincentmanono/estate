@extends('layouts.admin')


@section('title')
    <title>Chief Properties - {{ $params }}</title>
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
                <h4 class="text-themecolor">All {{ $params }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"> {{ $params }}</li>
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
                                        <h4 class="card-title"> {{ $params }} Data Export</h4>
                                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                        <div class="table-responsive m-t-40">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>ID </th>
                                                        <th>Unit</th>
                                                        <th> Property</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>ID </th>
                                                        <th>Unit</th>
                                                        <th>Property</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>


                                                    @foreach ($tenants as $tenant)

                                                    <tr>
                                                        <td> {{ $tenant->name }}</td>
                                                        <td>{{ $tenant->phone }}</td>
                                                        <td>{{ $tenant->email }} </td>
                                                        <td>{{ $tenant->id_no }}</td>
                                                        <td>
                                                            @foreach ($leases as $lease)
                                                                @if($lease->user_id == $tenant->id)
                                                                    {{ $lease->unit->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($leases as $lease)
                                                                @if($lease->user_id == $tenant->id)
                                                                    {{ $lease->unit->property->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>


                                                    </tr>


                                                    @endforeach

                                                </tbody>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

@endsection
