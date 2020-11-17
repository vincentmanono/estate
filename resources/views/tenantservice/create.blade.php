@extends('layouts.admin')
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
                <h4 class="text-themecolor">Service Page</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Service Request</li>
                    </ol>
                    {{--  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>  --}}
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
                                    {{--  <div class="card-header bg-info">
                                        <h4 class="mb-0 text-white">Other Sample form</h4>
                                    </div>  --}}


                                  <form action="{{ route('tenantservice.store') }}" enctype="multipart/form-data" method="post">

                                    @csrf
                                    @method('POST')
                                    <div class="card-body">
                                        <h4 class="card-title">Fill Request Form</h4>
                                    </div>
                                    <hr>
                                    <div class="form-body">
                                        <div class="card-body">
                                            <div class="row pt-3">
                                                <div class="col-md-6">
                                                   <div class="form-group has-success">
                                                        <label class="control-label">Unit Name</label>
                                                        <select  name="unit_id" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">


                                                            @foreach ($leases as $lease)

                                                            @if (Auth::user()->id == $lease->user->id)

                                                            <option value="{{ $lease->unit->id }}">{{ $lease->unit->name ."(" . $lease->unit->property->name .")"}}</option>

                                                            @endif



                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-success">
                                                         <label class="control-label">Description</label>
                                                         <textarea type="text" rows="6" name="message" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                          

                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Request</button>
                                                <a href="{{ route('home') }}" type="button" class="btn btn-dark">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                </div>
                            </div></div>
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
