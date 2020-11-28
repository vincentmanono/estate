@extends('layouts.admin')
@section('title')
    <title>Chief Properties -{{ $param }}</title>
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


                    <h4 class="text-themecolor">{{ $param }}</h4>


                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Deposit</li>
                        </ol>
                        @if ($param == 'Edit deposit Details')
                            <a type="button" href="{{ route('deposit.create') }}"
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
                                        @if ($param == 'Add deposit Records')

                                            @if (Auth::user()->isOwner())
                                                <form action="{{ route('deposit.store') }}" enctype="multipart/form-data"
                                                    method="post">

                                                    @csrf
                                                    @method('POST')
                                                    <div class="card-body">
                                                        <h4 class="card-title">Add deposit Records</h4>
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
                                                                            data-placeholder="Choose a Category"
                                                                            tabindex="1">

                                                                            <option value="">--select -tenant-name--
                                                                            </option>
                                                                            @foreach ($units as $unit)

                                                                                <option value="{{ $unit->id }}">
                                                                                    {{ $unit->name }}  (  {{ $unit->property->name }} )

                                                                                </option>

                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Tenant Name</label>
                                                                        <select required name="user_id"
                                                                            class="form-control custom-select"
                                                                            data-placeholder="Choose a Category"
                                                                            tabindex="1">

                                                                            <option value="">--select -tenant-name--
                                                                            </option>
                                                                            @foreach ($tenants as $tenant)

                                                                                <option value="{{ $tenant->id }}">
                                                                                    {{ $tenant->name . "  ( ".  $tenant->type . " )" }}
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
                                                                        <input required type="type" name="amount"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Status</label>
                                                                        <select required name="status"
                                                                            class="form-control custom-select" id="">

                                                                            <option value="">--select-status--</option>
                                                                            <option value="Claimed">Claimed</option>
                                                                            <option value="Active">Active</option>
                                                                            <option value="Refunded">Refunded</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Date</label>
                                                                        <input required type="date" name="date" class="form-control">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-actions">
                                                                <div class="card-body">
                                                                    <button type="submit" class="btn btn-success"> <i
                                                                            class="fa fa-check"></i> Save</button>
                                                                    <a href="{{ route('deposit.index') }}" type="button"
                                                                        class="btn btn-dark">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </form>
                                            @else

                                            <form action="{{ route('deposit.store') }}" enctype="multipart/form-data"
                                                    method="post">

                                                    @csrf
                                                    @method('POST')
                                                    <div class="card-body">
                                                        <h4 class="card-title">Add deposit Records</h4>
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
                                                                            data-placeholder="Choose a Category"
                                                                            tabindex="1">

                                                                            <option value="">--select -tenant-name--
                                                                            </option>
                                                                            @foreach ($properties as $property)

                                                                            @foreach ($property->units as $unit)
                                                                                 <option value="{{ $unit->id }}">
                                                                                    {{ $unit->name }}  (  {{ $unit->property->name }} )
                                                                                </option>
                                                                            @endforeach




                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Tenant Name</label>
                                                                        <select required name="user_id"
                                                                            class="form-control custom-select"
                                                                            data-placeholder="Choose a Category"
                                                                            tabindex="1">

                                                                            <option value="">--select -tenant-name--
                                                                            </option>
                                                                            @foreach ($tenants as $tenant)

                                                                                <option value="{{ $tenant->id }}">
                                                                                    {{ $tenant->name . "  ( ".  $tenant->type . " )" }}
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
                                                                        <input required type="type" name="amount"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Status</label>
                                                                        <select required name="status"
                                                                            class="form-control custom-select" id="">

                                                                            <option value="">--select-status--</option>
                                                                            <option value="Claimed">Claimed</option>
                                                                            <option value="Active">Active</option>
                                                                            <option value="Refunded">Refunded</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Date</label>
                                                                        <input required type="date" name="date" class="form-control">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-actions">
                                                                <div class="card-body">
                                                                    <button type="submit" class="btn btn-success"> <i
                                                                            class="fa fa-check"></i> Save</button>
                                                                    <a href="{{ route('deposit.index') }}" type="button"
                                                                        class="btn btn-dark">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </form>

                                            @endif




                                        @elseif('Edit deposit Records')

                                            <form action="{{ route('deposit.update', $deposit->id) }}"
                                                enctype="multipart/form-data" method="post">

                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <h4 class="card-title">Update deposit Records</h4>
                                                    <span>
                                                        Tenant : {{ $deposit->user->name . ' ' . $deposit->user->phone }}
                                                    </span>
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

                                                                        <option value="{{ $deposit->unit->id }}" selected>
                                                                            {{ $deposit->unit->name }}
                                                                        </option>
                                                                        @foreach ($deposit->unit->property->units as $unit)

                                                                            <option value="{{ $unit->id }}">
                                                                                {{ $unit->name . " ( ". $unit->property->name . " )" }}
                                                                            </option>

                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <input required type="hidden" value="{{ $deposit->user->id }}"
                                                                        name="user_id">

                                                                    <label class="control-label">Amount</label>
                                                                    <input required type="type" value="{{ $deposit->amount }}"
                                                                        name="amount" class="form-control">


                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Date</label>
                                                                    <input required type="date" value="{{ $deposit->date }}"
                                                                        name="date" class="form-control">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label">Status</label>
                                                                    <select required name="status" class="form-control custom-select"
                                                                        id="">
                                                                        <option value="{{ $deposit->status }}" selected>
                                                                            {{ $deposit->status }}
                                                                        </option>
                                                                        <option value="Claimed">Claimed</option>
                                                                        <option value="Active">Active</option>
                                                                        <option value="Refunded">Refunded</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->


                                                        <div class="form-actions">
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-success"> <i
                                                                        class="fa fa-check"></i> Save</button>
                                                                <a href="{{ route('deposit.index') }}" type="button"
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
