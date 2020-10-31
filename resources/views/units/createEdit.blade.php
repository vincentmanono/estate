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
                            @if ($param == 'Add New Unit')
                            Add unit


                            @else
                            Edit unit

                            @endif
                        </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active"> @if ($param == 'Add New Unit')
                                    Add unit


                                    @else
                                    Edit unit

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

                                <a  href="{{route('unit.index')}}" class="btn btn-primary" >Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                          @if ($param =='Add New Unit')
                             <form action="{{route('unit.store')}}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                 @method('POST')
                                <div class="form-body">
                                    <h3 class="card-title">Enter Unit Details</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Unit Name</label>
                                                <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                              </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Property Name</label>
                                                <select class="form-control custom-select" name="property_id"  tabindex="1">

                                                    <option value="">--select-property--</option>

                                               @foreach ($properties as $property)
                                               <option value="{{ $property->id }}">{{ $property->name }}</option>
                                               @endforeach



                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Service Charge</label>
                                                <input type="text" id="firstName" name="service_charge" class="form-control" >

                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success" >
                                                <label class="control-label">Billing Cycle</label>
                                                <input type="text" name="billing_cycle" class="form-control @error('billing_cycle') is-invalid @enderror" value="{{ old('billing_cycle') }}" required autocomplete="billing_cycle" autofocus>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Water Meter No</label>
                                            <input type="text" id="water_acc_no" name="water_acc_no"  class="form-control @error('water_acc_no') is-invalid @enderror" value="{{ old('water_acc_no') }}" required autocomplete="water_acc_no" autofocus>
                                          </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Electricity Meter No</label>
                                            <input type="text" id="electricity_acc_no" name="electricity_acc_no" class="form-control @error('electricity_acc_no') is-invalid @enderror" value="{{ old('electricity_acc_no') }}" required autocomplete="electricity_acc_no" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Rent Amount (KSH)</label>
                                            <input type="number" id="rent" name="rent" class="form-control @error('rent') is-invalid @enderror" value="{{ old('rent') }}" required autocomplete="rent" autofocus>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success" >

                                            <div class="form-group">
                                                <label for="status">Unit Status</label>
                                                <select id="status" class="form-control" name="status" required >
                                                    <option value="0" >Vacant</option>
                                                    <option value="1">Occupied</option>
                                                </select>
                                            </div>
                                          </div>
                                    </div>

                                </div>
                                    <!--/span-->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a type="button" href="{{ route('home') }}" class="btn btn-dark">Cancel</a>
                                </div>
                            </form>

                            @elseif($param =='Edit Unit Details')
                            <form action="{{route('unit.update',$unit->id)}}" method="post" enctype="multipart/form-data" >
                                @csrf
                             @method('PUT')
                            <div class="form-body">
                                <h3 class="card-title">Enter unit Details</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Unit Name</label>
                                            <input type="text" id="firstName" value="{{ $unit->name }}" name="name" class="form-control" >
                                          </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Property Name</label>
                                            <select class="form-control custom-select" name="property_id"  tabindex="1">
                                                <option value="{{ $unit->property->id }}" selected>{{ $unit->property->name }}</option>

                                           @foreach ($properties as $property)
                                           <option value="{{ $property->id }}">{{ $property->name }}</option>
                                           @endforeach



                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Service Charge</label>
                                            <input type="text" id="firstName" value="{{ $unit->service_charge }}" name="service_charge" class="form-control" >

                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-success" >
                                            <label class="control-label">Billing Cycle</label>
                                            <input type="text" value="{{ $unit->billing_cycle }}" name="billing_cycle" class="form-control" >
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-success" >
                                        <label class="control-label">Water Meter No</label>
                                        <input type="text" id="firstName" value="{{ $unit->water_acc_no }}" name="water_acc_no" class="form-control" >
                                      </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success" >
                                        <label class="control-label">Electricity Meter No</label>
                                        <input type="text" id="firstName" value="{{ $unit->electricity_acc_no }}" name="electricity_acc_no" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-success" >
                                        <label class="control-label">Rent Amount (KSH)</label>
                                        <input type="number" id="rent" name="rent" class="form-control @error('rent') is-invalid @enderror" value="{{ old('rent') ? old('rent') :$unit->rent }}" required autocomplete="rent" autofocus>
                                      </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-success" >

                                        <div class="form-group">
                                            <label for="status">Unit Status</label>
                                            <select id="status" class="form-control" name="status" required >
                                                <option selected value="{{ $unit->status }}">{{ ($unit->status) ? "Occupied":"Vacant" }}</option>
                                                <option value="0" >Vacant</option>
                                                <option value="1">Occupied</option>
                                            </select>
                                        </div>
                                      </div>
                                </div>

                            </div>
                                <!--/span-->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a type="button" href="{{ route('home') }}" class="btn btn-dark">Cancel</a>
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
