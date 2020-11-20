
@extends('layouts.admin')


@section('title')
    <title>Chief Properties - {{ $params }}</title>
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
                <h4 class="text-themecolor">Written messages to System Users</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">sms</li>
                    </ol>
                    <a href="{{ route('create.sms') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                                        <h4 class="card-title">Written messages to System Users</h4>
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
                                                        <th>Message</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($allsms as $sms)
                                                        <tr>
                                                            <td>{{ $sms->unit->property->name }}</td>

                                                            <td>{{ $sms->unit->name }}</td>


                                                            <td>{{ $sms->sendTo->name }}</td>
                                                            <td> {{ $sms->message }}</td>
                                                            <td>
                                                                <form action="{{ route('delete.sms',$sms->id) }}" method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach





                                                    <thead>
                                                        <tr>

                                                            <th>Property</th>
                                                            <th>Unit</th>
                                                            <th>Tenant</th>
                                                            <th>Message</th>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
@stop
