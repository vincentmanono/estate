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
                        <h4 class="text-themecolor">
                            @if ($param == 'Add Property')
                            Add Property


                            @else
                            Edit Property

                            @endif
                        </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active"> @if ($param == 'Add Property')
                                    Add Property


                                    @else
                                    Edit Property

                                    @endif
                                </h4></li>
                            </ol>
                            {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> --}}
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <div style="float: right">

                                <a  href="{{route('property.index')}}" class="btn btn-primary" >Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                          @if ($param =='Add Property')
                          <form action="{{route('property.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                                <div class="form-body">
                                    <h3 class="card-title">Enter Property Details</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Property Name</label>
                                                <input type="text" id="firstName" name="name" class="form-control" >
                                              </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Date of Certificate of Occupation</label>
                                                <input type="date" name="date_of_cert_of_occupation" id="lastName" class="form-control form-control-danger" >
                                                 </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Address</label>
                                                <input type="text" id="firstName" name="address" class="form-control" >

                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Year of Construction</label>
                                                <input type="date" name="year_of_construction" class="form-control" >
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Branch</label>
                                                <select class="form-control custom-select" name="branch_id" data-placeholder="Choose a Category" tabindex="1">
                                                   @foreach ($branches as $branch)

                                                <option value="{{$branch->id}}">{{$branch->name}}</option>

                                                   @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Property Manager</label>
                                                <select class="form-control custom-select" name="user_id" data-placeholder="Choose a Category" tabindex="1">

                                                    <option value="">--select-manager--</option>
                                                    @foreach ($users as $user)


                                                <option value="{{$user->id}}">{{$user->name}}</option>

                                                    @endforeach
                                                    </select>
                                            </div>
                                        <!--/span-->
                                    </div>
                                    {{-- row --}}



                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label>Post Code</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label>Country</label>
                                                <select class="form-control custom-select">
                                                    <option>--Select your Country--</option>
                                                    <option>India</option>
                                                    <option>Sri Lanka</option>
                                                    <option>USA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Water Billing Rate</label>

                                            <input type="text" class="form-control" name="water_bill_rate" id="">
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">L-R Number</label>

                                           <input type="text" name="l_r_no" class="form-control" id="">
                                        </div>
                                    <!--/span-->

                                    </div>

                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Property Image</label> <br>
                                            <input type="file" src="" alt="" name="image">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Type</label>
                                            <select class="form-control custom-select" name="type" data-placeholder="Choose a Category" tabindex="1">

                                            <option value="">--select-type--</option>
                                            <option value="residential">residential</option>
                                            <option value="commercial">commercial</option>
                                            <option value="service_resident">service_resident</option>


                                            service_resident

                                            </select>

                                    </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a type="button" href="{{ route('property.index') }}" class="btn btn-dark">Cancel</a>
                                </div>
                            </form>
                          @elseif($param =='Edit Property')
                          <form action="{{route('property.update',$property->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="form-body">
                                    <h3 class="card-title">Enter Property Details</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Property Name</label>
                                                <input type="text" id="firstName" name="name"  value="{{$property->name}}" class="form-control" >
                                              </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Date of Certificate of Occupation</label>
                                                <input type="date" name="date_of_cert_of_occupation" value="{{$property->date_of_cert_of_occupation}}" id="lastName" class="form-control " >
                                                 </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Address</label>
                                            <input type="text" id="firstName" name="address" value="{{$property->address}}" class="form-control" >

                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Year of Construction</label>
                                            <input type="date" value="{{$property->year_of_construction}}" name="year_of_construction" class="form-control" >
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Branch</label>
                                                <select class="form-control custom-select" name="branch_id"  data-placeholder="Choose a Category" tabindex="1">
                                                <option value="{{$property->branch->id}}" selected>{{$property->branch->name}}</option>
                                                   @foreach ($branches as $branch)

                                                <option value="{{$branch->id}}">{{$branch->name}}</option>

                                                   @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Property Manager</label>
                                                <select class="form-control custom-select" name="user_id" data-placeholder="Choose a Category" tabindex="1">
                                                <option value="{{$property->user->id ?? "" }}" selected>{{$property->user->name ?? ""}}</option>
                                                    @foreach ($users as $user)


                                                <option value="{{$user->id}}">{{$user->name}}</option>

                                                    @endforeach
                                                    </select>
                                            </div>
                                        <!--/span-->
                                    </div>
                                    {{-- row --}}


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Water Billing Rate</label>

                                        <input type="text" class="form-control" value="{{$property->water_bill_rate}}" name="water_bill_rate" id="">
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">L-R Number</label>

                                        <input type="text" name="l_r_no" value="{{$property->l_r_no}}" class="form-control" id="">
                                        </div>
                                    <!--/span-->

                                    </div>

                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Property Image</label><br>
                                        <input type="file" src="" alt="" value="{{old('image')}}" name="image">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Type</label>
                                            <select class="form-control custom-select" name="type" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="{{$property->type}}" selected>{{$property->type}}</option>
                                            <option value="residential">residential</option>
                                            <option value="commercial">commercial</option>
                                            <option value="service_resident">service_resident</option>


                                            service_resident

                                            </select>

                                    </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                </div>
                            </form>

                          @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->

                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
    </div>
    </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
@endsection
