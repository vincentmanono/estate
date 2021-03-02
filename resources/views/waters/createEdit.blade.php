@extends('layouts.admin')
@section('title')
    <title>{{ $param }} </title>
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


                    <h4 class="text-themecolor">water Records</h4>


                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">water</li>
                        </ol>
                        @if ($param == 'Edit water Details')
                            <a type="button" href="{{ route('water.create') }}"
                                class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New</a>
                        @endif
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

                            {{-- content here --}}

                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        {{-- <div class="card-header bg-info">
                                            <h4 class="mb-0 text-white">Other Sample form</h4>
                                        </div> --}}
                                        @if ($param == 'Add Water Records')

                                            <form action="{{ route('water.store') }}" enctype="multipart/form-data"
                                                method="post">

                                                @csrf
                                                @method('POST')
                                                <div class="card-body">
                                                    <h4 class="card-title">Add water Records</h4>
                                                </div>
                                                <hr>
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row pt-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Unit Name</label>
                                                                    <select required name="unit_id"
                                                                        class="form-control custom-select"
                                                                        data-placeholder="Choose a Category" tabindex="1">

                                                                        <option value="">--select -tenant-name--</option>

                                                                        @if (Auth::user()->isOwner())
                                                                            @foreach ($units as $unit)

                                                                                <option value="{{ $unit->id }}">
                                                                                    {{ $unit->name . " ( ". $unit->property->name }}
                                                                                </option>

                                                                            @endforeach

                                                                        @else


                                                                            @foreach ($properties as $property)
                                                                                @foreach ($property->units as $unit)

                                                                                    <option value="{{ $unit->id }}">
                                                                                        {{ $unit->name . " ( ". $unit->property->name }}

                                                                                    </option>

                                                                                @endforeach
                                                                            @endforeach


                                                                        @endif



                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Amount</label>
                                                                    <input required type="text" name="amount" class="form-control">

                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Pay Date</label>
                                                                    <input required type="date" name="pay_date" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">New Reading</label>
                                                                    <input required type="text" name="new_reading"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Read Date</label>
                                                                    <input required type="date" name="read_date"
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-success"> <i
                                                                        class="fa fa-check"></i> Save</button>
                                                                <a href="{{ route('water.index') }}" type="button"
                                                                    class="btn btn-dark">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>

                                        @elseif('Edit water Records')

                                            <form action="{{ route('water.update', $water->id) }}"
                                                enctype="multipart/form-data" method="post">

                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <h4 class="card-title">Edit water Record</h4>
                                                </div>
                                                <hr>
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row pt-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Unit Name</label>
                                                                    <select required name="unit_id"
                                                                        class="form-control custom-select"
                                                                        data-placeholder="Choose a Category" tabindex="1">

                                                                        <option value="{{ $water->unit->id }}" selected>
                                                                            {{ $water->unit->name }}</option>
                                                                        @foreach ($units as $unit)

                                                                            <option value="{{ $unit->id }}">
                                                                                {{ $unit->name }}</option>

                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Amount</label>
                                                                    <input required type="text" value="{{ $water->amount }}"
                                                                        name="amount" class="form-control">

                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Pay Date</label>
                                                                    <input required type="date" value="{{ $water->pay_date }}"
                                                                        name="pay_date" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">No of Months</label>
                                                                    <input required type="text" value="{{ $water->no_months }}"
                                                                        name="no_months" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Read Date</label>
                                                                    <input required type="date" value="{{ $water->read_date }}"
                                                                        name="read_date" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">New Reading</label>
                                                                    <input required type="text" value="{{ $water->new_reading }}"
                                                                        name="new_reading" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-success"> <i
                                                                        class="fa fa-check"></i> Save</button>
                                                                <a href="{{ route('water.index') }}" type="button"
                                                                    class="btn btn-dark">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>


                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Row -->


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
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->

@endsection
