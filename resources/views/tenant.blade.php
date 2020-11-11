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
                <h4 class="text-themecolor">Tenant Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">ChiefProperties </li>
                    </ol>
                    {{--  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>  --}}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <!--.row -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Property Name</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-home text-info"></i></h1>
                            <div class="ml-auto">
                                <h4 class="text-muted">


                                    @foreach ($leases as $lease)

                                    @if(Auth::user()->id == $lease->user->id)


                                    {{ $lease->unit->property->name }}
                                   @endif

                                    @endforeach
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Unit  Name</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="icon-tag text-purple"></i></h1>
                            <div class="ml-auto">
                                <h3 class="text-muted">
                                    @foreach ($leases as $lease)

                                    @if(Auth::user()->id == $lease->user->id)

                                    {{ $lease->unit->name }}
                                   @endif

                                    @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Rent Status</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-wallet text-danger"></i></h1>
                            <div class="ml-auto">
                                <h3 class="text-muted">
                                    @foreach ($rents as $rent)

                                    @if(Auth::user()->id == $rent->user_id)

                                     @if($rent->status ==1)
                                     Paid
                                     @else
                                     Not Paid
                                     @endif

                                   @endif

                                    @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Water Billing Status</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-wallet text-success"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">$8170</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Page Content -->
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
