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
                        <h4 class="text-themecolor">Property Detail</h4>

                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center row">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
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
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Amenities</h5>
                                        <hr class="m-0 p-10">
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Private Space</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">WiFi</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Basketball Court</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Fireplace</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Doorman</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Swimming Pool</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Gym</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Parking</h6>
                                        </div>
                                        <div class="d-flex fa fa-check-circle text-success p-b-10">
                                            <h6 class="m-l-10 text-dark">Laundry</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Room Dimensions</h5>
                                        <div class="table-responsive p-t-10 border-top">
                                            <table class="table no-border">
                                                <tbody class="text-dark">
                                                    <tr>
                                                        <td>Dining Room</td>
                                                        <td>8x8</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kitchen</td>
                                                        <td>10x12</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Living Room</td>
                                                        <td>12x15</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Master Bedroom</td>
                                                        <td>12x10.2</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bedroom 2</td>
                                                        <td>11x9</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other Room 1</td>
                                                        <td>8x8</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <div class="card p-l-0 p-r-0 p-b-10">
                                    <div class="card-body">
                                        <h5 class="card-title fw-500 p-l-20">Location</h5>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d117506.98606137399!2d72.5797426!3d23.020345749999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1476988114677" width="100%" height="244" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                                            <tr>
                                                <td>Full Baths</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>L R Number</td>
                                                <td>{{$property->l_r_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Square Footage</td>
                                                <td>2,123</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body bg-light">

                                <div class="text-center">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="/storage/users/{{ $property->user->image }}"></a>
                                <h4>{{$property->user->name}}</h4>
                                    <h6>Property {{$property->user->type}}</h6> </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="text-center"> <i class="fa fa-phone text-danger p-r-10" aria-hidden="true"></i> {{$property->user->phone}}
                                    <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> {{$property->user->email}} </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="pd-agent-inq">
                                    <h5 class="card-title">Modify Property</h5>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('property.images.create',$property->id) }}" role="button">Add Property Images </a>
                                    <a name="" id="" class="btn btn-warning" href="#" role="button">Edit Property</a>
                                    <a name="" id="" class="btn btn-danger mt-3"  onclick=" deleteProperty()" role="button">Delete Property</a>
                                    <form id="deleteproperty" action="{{route('property.destroy',$property->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                    </form>


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

