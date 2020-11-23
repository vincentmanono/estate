@extends('layouts.admin')

@section('title')
    <title> {{ $param }} </title>
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


                    <h4 class="text-themecolor">Rent Records</h4>


                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Rent</li>
                        </ol>
                        @if ($param == 'Edit Rent Details')
                            <a type="button" href="{{ route('rent.create') }}"
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

                                        @if ($param == 'Add Rent Records')


                                            <form action="{{ route('rent.store') }}" enctype="multipart/form-data"
                                                method="post">

                                                @csrf
                                                @method('POST')
                                                <div class="card-body">
                                                    <h4 class="card-title">Add Rent Records</h4>
                                                </div>
                                                <hr>
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row pt-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Unit Name</label>
                                                                    <select name="unit_id"
                                                                        class="form-control custom-select"
                                                                        data-placeholder="Choose a Category" tabindex="1">

                                                                        <option value="" disabled selected>--select
                                                                            -unit-name--</option>


                                                                        @if (Auth::user()->isOwner())
                                                                            @foreach ($units as $unit)

                                                                                <option value="{{ $unit->id }}">
                                                                                    {{ $unit->name . '  ( ' . $unit->property->name . ' )' }}
                                                                                </option>

                                                                            @endforeach

                                                                        @else

                                                                            @foreach ($properties as $property)
                                                                                @foreach ($property->units as $unit)
                                                                                    <option value="{{ $unit->id }}">
                                                                                        {{ $unit->name . '  ( ' . $unit->property->name . ' )' }}
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
                                                                    <label class="control-label">Tenant Name</label>
                                                                    <select name="user_id"
                                                                        class="form-control custom-select"
                                                                        data-placeholder="Choose a Category" tabindex="1">

                                                                        <option value="">--select -tenant-name--</option>
                                                                        @foreach ($tenants as $tenant)

                                                                            <option value="{{ $tenant->id }}">
                                                                                {{ $tenant->name . ' ( ' . $tenant->type . ' )' }}
                                                                            </option>

                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Amount</label>
                                                                    <input type="type" name="amount" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Paid Date</label>
                                                                    <input type="date" name="paid_date"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">ExpiryDate</label>
                                                                    <input type="date" name="expiry_date"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Description</label>
                                                                    <textarea type="text" rows="6" name="description"
                                                                        class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-success"> <i
                                                                        class="fa fa-check"></i> Save</button>
                                                                <a href="{{ route('rent.index') }}" type="button"
                                                                    class="btn btn-dark">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>

                                        @elseif('Edit Rent Details')

                                            <form action="{{ route('rent.update', $rent->id) }}"
                                                enctype="multipart/form-data" method="post">

                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <h4 class="card-title">Update Rent Records</h4>
                                                </div>
                                                <hr>
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row pt-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Unit Name</label>
                                                                    <select name="unit_id"
                                                                        class="form-control custom-select"
                                                                        data-placeholder="Choose a Category" tabindex="1">

                                                                        <option value="{{ $rent->unit->id }}" selected>
                                                                            {{ $rent->unit->name }}
                                                                        </option>
                                                                        @foreach ($rent->property->units as $unit)

                                                                            <option value="{{ $unit->id }}">
                                                                                {{ $unit->name }}
                                                                            </option>

                                                                        @endforeach

                                                                    </select>
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $rent->user->id }}">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Amount</label>
                                                                    <input type="type" value="{{ $rent->amount }}"
                                                                        name="amount" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label"> Date Paid</label>
                                                                    <input type="date" value="{{ $rent->paid_date }}"
                                                                        name="paid_date" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Expiry Date</label>
                                                                    <input type="date" value="{{ $rent->expiry_date }}"
                                                                        name="expiry_date" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Description</label>
                                                                    <textarea type="text" rows="6" name="description"
                                                                        class="form-control">{{ $rent->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="form-actions ">
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-success"> <i
                                                                        class="fa fa-check"></i> Save</button>
                                                                <a href="{{ route('rent.index') }}" type="button"
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
