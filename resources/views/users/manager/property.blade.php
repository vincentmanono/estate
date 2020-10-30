@extends('layouts.admin')
@section('title')
    <title>{{  "Manage property" }} </title>
@stop
@section('content')


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
                        <h4 class="text-themecolor">Property Detail</h4>

                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center row">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Property Detail</li>
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
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="img-responsive" src="/storage/property/{{$property->image}}" alt="{{ $property->name }}">
                                        </div>

                                        @foreach ($property->images as $image)

                                            <div class="carousel-item">
                                            <img class="img-responsive" src="/storage/property/{{ $image->image }}" alt="{{ $property->name  }}">
                                        </div>
                                        @endforeach



                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                                <div class="p-t-20 p-b-20">
                                    <h4 class="card-title">Property Images</h4>
                                    <h5 class="m-b-0"><span class="text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>{{ $property->address }}</span></h5>
                                </div>
                                <hr class="m-0">
                                <h4 class="card-title">Property Description</h4>
                                <p class="text-dark p-t-20 pro-desc">{{ $property->description }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Essential Information</h5>
                                <div class="table-responsive">

                                    <table class="table table-hover table-inverse table-responsive">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Type</th>
                                                <th>Address</th>
                                                <th>water bill rate</th>
                                                <th>Units</th>
                                                <th>Expenses Cost</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row"> {{$property->type  }}</td>

                                                    <td>{{$property->address}}</td>
                                                    <td> {{ $property->water_bill_rate }}</td>
                                                    <td> {{ $property->units->count() }}</td>
                                                    <td> Ksh {{ number_format( $sumExpenses,2) }}</td>
                                                    <td>
                                                        <a name="" id="" class="btn btn-primary" href="{{ route('manager.property.expenses',$property->id) }}" role="button"> <i class="fa fa-envelope-open" aria-hidden="true">Expenses</i>  </a>

                                                    </td>
                                                </tr>

                                            </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12 col-md-612col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                Unit and Tenant
                            </div>
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Unit Name</th>
                                            <th>Billing Cycle</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($property->units as $unit)

                                        <tr>
                                        <td>{{$unit->name}}</td>
                                        <td>{{ $unit->billing_cycle }}</td>

                                        <td class="row">
                                            <a class="btn btn-info " href="{{ route('unit.show',$unit->id) }}" data-toggle="tooltip" title="View"> <i class="ti-eye"></i> View</a>
                                            <a style="margin-left: 2%;margin-right:2%; " class="btn btn-success " href="{{ route('unit.edit',$unit->id) }}" data-toggle="tooltip" title="Edit"> <i class="ti-marker-alt"></i>Edit</a>

                                        </td>
                                        </tr>
                                        @endforeach
                                        <thead>
                                            <tr>
                                                <th>Unit Name</th>
                                                <th>Billing Cycle</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                Footer
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
        <!-- ============================================================== -->


@endsection


@section('extraScripts')
<script>
    function deleteProperty(){
        event.preventDefault();
        if( confirm('Are you sure you want to delete this Property?')  ){

            document.getElementById("deleteproperty").submit();
        }

    }
</script>

@stop

