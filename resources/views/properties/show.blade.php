@extends('layouts.admin')
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
                        <h4 class="text-themecolor">Property Details</h4>

                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center row">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Property Details</li>
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
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        @include('includes.slider')
                      @if (Auth::user()->type == 'manager' || Auth::user()->type == 'owner' )

                      <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Units</h5>
                                    <hr class="m-0 p-10">

                                   @foreach ($units as $unit)

                                   @if ($unit->property_id == $property->id)

                                   <div class="d-flex fa fa-check-circle text-success p-b-10">
                                    <h6 class="m-l-10 text-dark">{{ $unit->name }}</h6>
                                </div>

                                   @endif

                                   @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title" style="margin-right: 30%;">Tenant Name</h5>
                                    <h5 class="card-title">Unit Name</h5>
                                    </div>
                                    <div class="table-responsive p-t-10 border-top">
                                        <table class="table no-border">
                                            <tbody class="text-dark">



                                   @foreach ($leases as $lease)

                                   @if ($lease->unit->property_id == $property->id && $lease->unit->status ==1)

                                    <tr>
                                        <td>{{ $lease->user->name }}</td>
                                        <td>{{ $lease->unit->name }}</td>
                                    </tr>

                                   @endif



                                    @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                      @endif
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">


                        <div class="card">
                            <div class="card-body bg-light">
                                <h6>Property {{$property->user->type ?? "" }}</h6>
                                <div class="text-center">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="/storage/users/{{ $property->user->image ?? '' }}"></a>
                                <h4>{{$property->user->name ?? ''}}</h4>
                                    <h6>Property {{$property->user->type ?? ''}}</h6> </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="text-center"> <i class="fa fa-phone text-danger p-r-10" aria-hidden="true"></i> <a style="color: blue" href="tel: {{$property->user->phone ?? ''}}"> {{$property->user->phone ?? ''}}</a>
                                    <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i><a style="color: blue" href="mailto:{{$property->user->email ?? ''}} ">{{$property->user->email ?? ''}} </a> </div>
                            </div>


                           <div class="card-body border-top">
                            <div class="pd-agent-inq">
                                <h5 class="card-title">Modify Property</h5>
                                @can('update',  $property)
                                <a name="" id="" class="btn btn-info" href="{{ route('property.images.create',$property->id) }}" role="button"> <i class="fa fa-picture-o" aria-hidden="true"></i>Images</a>
                                <a name="" id="" class="btn btn-dark" href="{{ route('expense.index',$property) }}" role="button"> <i class="ti-money" ></i>Expenses</a>

                                <a name="" id="" class="btn btn-success" href="{{ route('property.edit',$property) }}" role="button"> <i class="fas fa-edit "></i>Property</a>

                                @endcan
                                @can('delete',  $property)
                                                                        <a name="" id="" class="btn btn-danger mt-3"  onclick=" deleteProperty()" role="button">Delete Property</a>
                                                                          <form id="deleteproperty" action="{{route('property.destroy',$property)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                @endcan



                            </div>
                        </div>


                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Essential Information</h5>
                                <div class="table-responsive">
                                    <table class="table no-border">
                                        <tbody class="text-dark">
                                            <tr>
                                                <td>NAME</td>
                                                <td>{{$property->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Branch</td>
                                            <td>{{$property->branch->name}}</td>
                                            </tr>
                                                <td>Type</td>
                                            <td>{{$property->type}}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{$property->address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Year of Contruction</td>
                                                <td>{{$property->year_of_construction}}</td>
                                            </tr>
                                            {{--  <tr>
                                                <td>Full Baths</td>
                                                <td>3</td>
                                            </tr>  --}}
                                            <tr>
                                                <td>L R Number</td>
                                                <td>{{$property->l_r_no}}</td>
                                            </tr>
                                            {{--  <tr>
                                                <td>Square Footage</td>
                                                <td>2,123</td>
                                            </tr>  --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            {{-- <div class="card-body">
                                <h5 class="card-title">Community Information</h5>
                                <div class="table-responsive p-t-10">
                                    <table class="table">
                                        <tbody class="text-dark">
                                            <tr>
                                                <td>Address</td>
                                                <td>Florida 5,
                                                    <br> Pinecrest, FL</td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <td>&#36; 220,000</td>
                                            </tr>
                                            <tr>
                                                <td>Subdivision</td>
                                                <td>Matindale</td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td>New York</td>
                                            </tr>
                                            <tr>
                                                <td>Full Bath</td>
                                                <td>AV</td>
                                            </tr>
                                            <tr>
                                                <td>Half Baths</td>
                                                <td>NAV</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- .row -->
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

