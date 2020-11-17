@extends('layouts.admin')

@section('title')
    <title> {{ $param }} </title>
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
                    <h4 class="text-themecolor">{{ $param }}</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Service Request</li>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">

                                        @if ($param == 'Create Tenant Request')
                                            <form action="{{ route('tenantservice.store') }}" enctype="multipart/form-data"
                                                method="post">
                                                @csrf
                                                @method('POST')
                                                <div class="card-body">
                                                    <h4 class="card-title">Fill Request Form</h4>
                                                </div>
                                                <hr>
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row ">
                                                            <div class="col-md-12">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Unit Name</label>
                                                                    <select name="unit_id"
                                                                        class="form-control custom-select"
                                                                        data-placeholder="Choose a Category" tabindex="1">
                                                                        @foreach ($leases as $lease)
                                                                            <option value="{{ $lease->unit->id }}">
                                                                                {{ $lease->unit->name . ' ( ' . $lease->unit->property->name . ' )' }}
                                                                            </option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">

                                                            <!--/span-->
                                                            <div class="col-md-12">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Description</label>
                                                                    <textarea type="text" rows="6" name="message"
                                                                        class="form-control @error('message') is-invalid @enderror"
                                                                        name="message" required></textarea>

                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->


                                                        <div class="form-actions">
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-success"> <i
                                                                        class="fa fa-check"></i> Request</button>
                                                                <a href="{{ route('home') }}" type="button"
                                                                    class="btn btn-dark">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                        @else

                                        <form action="{{ route('tenantservice.update',$service->id) }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <h4 class="card-title">Fill Request Form</h4>
                                        </div>
                                        <hr>
                                        <div class="form-body">
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Unit Name</label>
                                                            <select name="unit_id" class="form-control custom-select"
                                                                data-placeholder="Choose a Category" tabindex="1">
                                                                @foreach ($service->user->leases as $lease)
                                                                <option value="{{ $service->unit->id }}" selected >{{ $service->unit->name }}</option>
                                                                    <option value="{{ $lease->unit->id }}">
                                                                        {{ $lease->unit->name . " ( ".$lease->unit->property->name . " )"   }} </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">

                                                    <!--/span-->
                                                    <div class="col-md-12">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Description</label>
                                                            <textarea type="text" rows="6" name="message" class="form-control @error('message') is-invalid @enderror" name="message"  required>{{ $service->message }}</textarea>

                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->


                                                <div class="form-actions">
                                                    <div class="card-body">
                                                        <button type="submit" class="btn btn-success"> <i
                                                                class="fa fa-check"></i> Update</button>
                                                        <a href="{{ route('home') }}" type="button"
                                                            class="btn btn-dark">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>

                                        @endif



                                    </div>
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

@endsection
