@extends('layouts.admin')
@section('title')
<title>Chief Properties -{{ $params }}</title>
@endsection




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
                <h4 class="text-themecolor text text-capitalize">Tenant : <span class="text text-info " >{{ $lease->user->name }} </span> <span class=" pl-3" >Unit <span class="text text-info "> {{ $lease->unit->name }}</span> </span> </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Lease Document</li>
                    </ol>
                    <a href="{{ route('lease.edit',$lease->id) }}" type="button" class="btn btn-info d-none d-lg-block m-l-15"> <i class="ti-marker-alt">Update Lease</i> </a>
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

                        @if ( ! Str::of( $lease->file)->contains("http") )
                                                    <embed src="/storage/lease/{{ $lease->file }}" type="application/pdf" width="100%" height="600px" />

                        @else

                            @include('lease.chiefinvestmentlease')

                        @endif




                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
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

