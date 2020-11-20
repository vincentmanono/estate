@extends('layouts.admin')

@section('title')
    <title>Chief Properties -{{ $params }}</title>
@stop

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
                        @if ($params == 'Add Lease Record')
                            Add lease


                        @else
                            Edit lease

                        @endif
                    </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">
                                @if ($params == 'Add Lease Record')
                                    {{ $params }}


                                @else
                                    {{ $params }}

                                @endif
                                </h4>
                            </li>
                        </ol>
                        {{-- <button type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                            New</button> --}}
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

                                <a href="{{ route('lease.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($params == 'Add Lease Record')
                                <form action="{{ route('lease.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-body">
                                        <h3 class="card-title">
                                            @if ($params == 'Add Lease Record')
                                                {{ $params }}


                                            @else
                                                {{ $params }}

                                            @endif
                                        </h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">

                                                <div class="form-group has-success">
                                                    <label class="control-label">Tenant Name</label>
                                                    <select class="form-control custom-select" name="user_id"
                                                        data-placeholder="Choose a Category" tabindex="1">


                                                        @foreach ($users as $user)

                                                            @if ($user->type == 'tenant')
                                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endif


                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Unit Name</label>
                                                    <select class="form-control custom-select" name="unit_id"
                                                        data-placeholder="Choose a Category" tabindex="1">

                                                        <option value="">--select-unit-name--</option>

                                                        @if (Auth::user()->isManager())
                                                            @foreach ($properties as $property)
                                                                @foreach ($property->units as $unit)
                                                                @if ( $unit->status == 0 )
                                                                    <option value="{{ $unit->id }}">{{ $unit->name }} (
                                                                        {{ $unit->property->name }} )
                                                                    </option>
                                                                @endif


                                                                @endforeach

                                                            @endforeach

                                                        @else
                                                            @foreach ($units as $unit)

                                                            <option value="{{ $unit->id }}">{{ $unit->name }} (
                                                                {{ $unit->property->name }} )
                                                            </option>                                                         @endforeach
                                                        @endif


                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Date Leased</label>
                                                    <input type="date" id="firstName" name="date" class="form-control">

                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Lease Status</label>
                                                    <select class="form-control custom-select" name="status"
                                                        data-placeholder="Choose a Category" tabindex="1">

                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->




                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label class="control-label">lease File</label> <br>
                                                <input type="file" src="" alt="" name="file">

                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                                Save</button>
                                            <a type="button" href="{{ route('lease.index') }}"
                                                class="btn btn-dark">Cancel</a>
                                        </div>
                                </form>
                            @else
                                <form action="{{ route('lease.update', $lease->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <h3 class="card-title">Enter lease Details</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <input type="hidden" name="user_id" value="{{ $lease->user_id }}">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Unit Name</label>
                                                    <select class="form-control custom-select" name="unit_id"
                                                        data-placeholder="Choose a Category" tabindex="1">



                                                        @if (Auth::user()->isManager())
                                                            @foreach ($properties as $property)

                                                                @foreach ($property->units as $unit)
                                                                    <option value="{{ $unit->id }}">{{ $unit->name }} (
                                                                        {{ $unit->property->name }} )
                                                                    </option>

                                                                @endforeach

                                                            @endforeach
                                                        @else

                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit->id }}">{{ $unit->name }} (
                                                                    {{ $unit->property->name }} )
                                                                </option>
                                                            @endforeach


                                                        @endif


                                                    </select>
                                                </div>

                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Date Leased</label>
                                                    <input type="date" id="firstName" value="{{ $lease->date }}" name="date"
                                                        class="form-control">

                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Lease Status</label>
                                                    <select class="form-control custom-select" name="status"
                                                        data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="{{ $lease->status }}">
                                                            {{ $lease->status ? 'Active' : 'Inactive' }}
                                                        </option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="file">Lease file</label>
                                                    <input id="file" class="form-control" type="file" name="file">
                                                </div>

                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->




                                    </div>


                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                            Save</button>
                                        <a type="button" href="{{ route('lease.index') }}" class="btn btn-dark">Cancel</a>
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
