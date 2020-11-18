@extends('layouts.admin')

@section('title')

    <title>Chief Properties -{{ $param }}</title>

@endsection
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
                    <h4 class="text-themecolor">Unit Details</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Unit Information</li>
                        </ol>


                        <form action="{{ route('unit.destroy', $unit->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');"
                                class="btn btn-danger d-none d-lg-block m-l-15"><i class="fa fa-minus-circle"></i>
                                Delete</button>

                        </form>


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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#floorplan">
                                @if ($unit->floor->count() != 0)
                                    <i class="fa fa-pencil" aria-hidden="true">Edit floor plan</i>
                                @else
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Unit Floor Plan
                                @endif

                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="floorplan" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text text-center text-bold ">
                                                {{ $unit->floor->count() > 0 ? 'Add' : 'Edit' }} Unit Floor Plan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="background-color: #b7e9df;">
                                            <div id="response"> </div>
                                            <form id="floorStoreForm"
                                                action="{{ $unit->floor->count() > 0 ? route('unit.floor.update', $unit->floor->id) : route('unit.floor.store', $unit->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf

                                                @if ($unit->floor->count())
                                                    @method("PUT")
                                                @endif

                                                <div class="d-flex flex-row">
                                                    <div class="form-group mr-2">
                                                        <label for="image">Floor architecture Image</label>
                                                        <input id="image" class="form-control" type="file" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kitchen">kitchen <i aria-hidden="true"></i> </label>
                                                        <input id="kitchen" @if ($unit->floor->count())
                                                        value="{{ $unit->floor->kitchen }}"
                                                        @endif
                                                        class="form-control" type="text" name="kitchen">
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row">
                                                    <div class="form-group mr-2">
                                                        <label for="sitting">Bathroom <i aria-hidden="true"></i></label>
                                                        <input id="sitting" class="form-control" @if ($unit->floor->count())
                                                        value="{{ $unit->floor->sitting }}"
                                                        @endif
                                                        type="text" name="sitting">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=" garage"> garage <i aria-hidden="true"></i></label>
                                                        <input id=" garage" @if ($unit->floor->count())
                                                        value="{{ $unit->floor->garage }}"
                                                        @endif
                                                        class="form-control" type="text" name=" garage">
                                                        <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="bedroom">bedroom <i aria-hidden="true"></i></label>
                                                            <input id="bedroom" @if ($unit->floor->count())
                                                            value="{{ $unit->floor->bedroom }}"
                                                            @endif
                                                            class="form-control" type="text" name="bedroom">
                                                            <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Unit Floor</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a style="float: right" href="{{ route('unit.edit', $unit->id) }}"
                                class="btn btn-sm btn-info">Edit Unit</a>
                            {{-- <a href="#">Add Floor Plan</a>
                            --}}
                            <!-- row -->
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Lease Information</h5>
                                                <div class="table-responsive">
                                                    <table class="table no-border">
                                                        <tbody class="text-dark">
                                                            @if ($unit->leased != null)
                                                                <tr>
                                                                    <td>Lease Status</td>
                                                                    <td>{{ $unit->leased->status ? 'Leased' : 'Expired' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Date Leased</td>
                                                                    <td>{{ date('F d, Y', strtotime($unit->leased->date)) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tenant Name</td>
                                                                    <td>{{ $unit->leased->user->name }}</td>
                                                                </tr>
                                                            @endif








                                                        </tbody>
                                                    </table>

                                                </div>
                                                Lease Agreement Document View
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- column -->
                                <div class="col-lg-9">
                                    <!-- Property Items -->
                                    <div class="card">
                                        <!-- row -->
                                        <div class="row no-gutters">
                                            <div class="col-md-5"
                                                style="background: url('/storage/floor/{{ $unit->floor->image }}') center center / cover no-repeat; min-height:250px;">
                                                <span class="pull-right label label-danger">Floor Plan</span>
                                            </div>
                                            <!-- column -->
                                            <div class="col-md-7">
                                                <!-- Row -->
                                                <div class="row no-gutters">
                                                    <!-- column -->
                                                    <div class="col-md-5 border-right border-bottom">
                                                        <div class="p-20">

                                                            <h5 class="card-title">Unit Name</h5>
                                                            <h5>{{ $unit->name }}</h5>
                                                            <h5 class="card-title">Poperty Name</h5>
                                                            <h5>{{ $unit->property->name }}</h5>

                                                        </div>
                                                    </div>
                                                    <!-- column -->
                                                    <div class="col-md-7 border-bottom">
                                                        <div class="p-20">
                                                            <div class="d-flex no-block align-items-center">
                                                                <span><img
                                                                        src="{{ asset('/assets/images/property/pro-bath.png') }}"></span>
                                                                <span class="p-10 text-muted">Bathrooms</span>
                                                                <span
                                                                    class="badge badge-pill badge-secondary ml-auto">{{ $unit->floor->sitting }}</span>

                                                            </div>
                                                            <div class="d-flex no-block align-items-center">
                                                                <span><img src="/assets/images/property/pro-bed.png"></span>
                                                                <span class="p-10 text-muted">Bedrooms</span>
                                                                <span
                                                                    class="badge badge-pill badge-secondary ml-auto">{{ $unit->floor->bedroom }}</span>
                                                            </div>
                                                            <div class="d-flex no-block align-items-center">
                                                                <span><img
                                                                        src="../assets/images/property/pro-garage.png"></span>
                                                                <span class="p-10 text-muted">Kitchen</span>
                                                                <span
                                                                    class="badge badge-pill badge-secondary ml-auto">{{ $unit->floor->kitchen }}</span>
                                                            </div>
                                                            <div class="d-flex no-block align-items-center">
                                                                <span><img
                                                                        src="../assets/images/property/pro-garage.png"></span>
                                                                <span class="p-10 text-muted">Garage</span>
                                                                <span
                                                                    class="badge badge-pill badge-secondary ml-auto">{{ $unit->floor->garage }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column -->
                                                    <div class="col-md-12" style="margin-left: 4%">
                                                        <h4 class="card-title">Meter No Information </h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">Water</h5>
                                                                <h5>{{ $unit->water_acc_no }}</h5>
                                                                <h5 class="card-title">Electricity</h5>
                                                                <h5>{{ $unit->electricity_acc_no }}</h5>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <h5 class="card-title">Billing Cycle</h5>
                                                                <h5>{{ $unit->billing_cycle }}</h5>
                                                                <h5 class="card-title">Rent </h5>
                                                                <h5>Ksh {{ number_format($unit->rent) }}</h5>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <h5 class="card-title">Unit Status</h5>
                                                                <h5>{{ $unit->status ? 'Leased' : 'Vacant' }}</h5>


                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">Service Charge</h5>
                                                                <h5>{{ $unit->service_charge }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- column -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- Property Items -->

                                </div>
                            </div>
                            <!-- /row -->
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title">Tenant Information</h4>

                                    <hr>



                                    <div class="card-body">


                                        @if ($unit->status && $unit->leased != null)
                                            <center class="m-t-30">
                                                <img src="/storage/user/{{ $unit->leased->user->image }}" class="img-circle"
                                                    width="150" />
                                                <h4 class="card-title m-t-10">{{ $unit->leased->user->name }}</h4>
                                                <h4 class="card-title m-t-10">Phone</h4>
                                                <h6 class="card-subtitle"> <a style="color: blue"
                                                        href="tel:{{ $unit->leased->user->phone }}">{{ $unit->leased->user->phone }}</a>
                                                </h6>
                                                <h5 class="card-title">Email Address</h5>


                                                <h6 class="card-subtitle"> <a style="color: blue"
                                                        href="mailto:{{ $unit->leased->user->email }}">{{ $unit->leased->user->email }}</a>
                                                </h6>


                                            </center>
                                        @else

                                        @endif

                                    </div>
                                    <hr>



                                </div>
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- Start Page Content -->
                                                    <!-- ============================================================== -->
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Unit Rent Records</h4>
                                                                    {{-- <h6
                                                                        class="card-subtitle">Data table example</h6>
                                                                    --}}
                                                                    <div style="float: right">
                                                                        <a class="btn btn-sm btn-primary"
                                                                            href="{{ route('unit.index') }}">Back</a>
                                                                    </div>
                                                                    <div class="table-responsive m-t-40">
                                                                        <table id="myTable"
                                                                            class="table table-bordered table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>AMOUNT</th>
                                                                                    <th>PAID DATE</th>
                                                                                    <th>EXPIRY DATE</th>
                                                                                    <th>DESCRIPTION</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($rents as $rent)


                                                                                    <tr>
                                                                                        <td>{{ number_format($rent->amount) }}
                                                                                        </td>
                                                                                        <td> {{ date('F d, Y', strtotime($rent->paid_date)) }}
                                                                                        </td>
                                                                                        <td>{{ date('F d, Y', strtotime($rent->expiry_date)) }}
                                                                                        </td>
                                                                                        <td>{{ Str::of($rent->description)->limit(100) }}
                                                                                        </td>

                                                                                    </tr>



                                                                                @endforeach


                                                                            </tbody>
                                                                            <tfoot>

                                                                                <th>AMOUNT</th>
                                                                                <th>EXPIRY DATE</th>
                                                                                <th>EXPIRY DATE</th>
                                                                                <th>DESCRIPTION</th>

                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- ============================================================== -->
                                                    <!-- End PAge Content -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>













                                </div>

                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- Start Page Content -->
                                                    <!-- ============================================================== -->
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Unit Water Billing</h4>
                                                                    {{-- <h6
                                                                        class="card-subtitle">Data table example</h6>
                                                                    --}}
                                                                    <div style="float: right">

                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addwater">
                                                                          <i class="fa fa-plus" aria-hidden="true"></i> New water reading
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="addwater" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Add new water reading</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="{{ route('water.reading',$unit->id) }}" method="post">
                                                                                            @csrf
                                                                                            @method("put")
                                                                                            <div class="form-group">
                                                                                                <label for="read_date"> Reading Date</label>
                                                                                                <input type="date" required name="read_date" class="form-control" placeholder="date of reading">
                                                                                              </div>
                                                                                            <div class="form-group">
                                                                                              <label for="">New reading</label>
                                                                                              <input type="text" required name="new_reading" class="form-control" placeholder="Water reading">
                                                                                            </div>
                                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="table-responsive m-t-40">
                                                                        <table id="myTable"
                                                                            class="table table-bordered table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Amount To Pay</th>
                                                                                    <th>Pay Date</th>
                                                                                    <th>Read Date</th>
                                                                                    <th>previous reading</th>
                                                                                    <th>New Reading</th>
                                                                                    <th>Status</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                @foreach ($waters as $water)
                                                                                    <tr>
                                                                                        <td>KSH
                                                                                            {{ number_format($water->amount) }}
                                                                                        </td>
                                                                                        <td>{{ $water->pay_date }}</td>
                                                                                        <td>{{ $water->read_date }}</td>
                                                                                        <td>{{ number_format($water->previous_reading) }}
                                                                                        </td>
                                                                                        <td>{{ number_format($water->new_reading) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            @if ($water->paid)
                                                                                                <span
                                                                                                    class="badge badge-pill badge-success">Paid</span>
                                                                                            @else
                                                                                                <span
                                                                                                    class="badge badge-pill badge-danger">Not
                                                                                                    Paid</span>
                                                                                            @endif

                                                                                        </td>
                                                                                        <td>
                                                                                            <!-- Button trigger modal -->
                                                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="{{ '#payment'.$water->id }}">
                                                                                              <i class="fa fa-plus" aria-hidden="true"></i> water payment
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="{{ 'payment'.$water->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title">Add Water Billing payment</h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <div>Amount Expected to be Paid KSH {{ number_format($water->amount) }} </div>
                                                                                                            <form action="{{ route('water.payment',$water->id) }}" method="post">
                                                                                                                @csrf
                                                                                                                @method("put")
                                                                                                                <div class="form-group">
                                                                                                                  <label for="amount">Amount Ksh</label>
                                                                                                                  <input type="text" name="amount" required min="{{ $water->amount }}" id="amount" class="form-control" placeholder="Amount">
                                                                                                                </div>

                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                            <button type="submit" class="btn btn-success">Save</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                <tr>
                                                                                    <td class="text text-capitalize " colspan="3" >Total Amount expected to Pay </td>
                                                                                    <td class=" text text-danger" colspan="2" >KSH {{ number_format($unPaidWaterBilling) }}</td>

                                                                                </tr>
                                                                            </tbody>
                                                                            <tfoot>

                                                                                <th>Amount To Pay</th>
                                                                                <th>Pay Date</th>
                                                                                <th>Read Date</th>
                                                                                <th>previous reading</th>
                                                                                <th>New Reading</th>
                                                                                <th>Status</th>
                                                                                <th>
                                                                                    Action
                                                                                </th>

                                                                            </tfoot>
                                                                        </table>
                                                                        <div>
                                                                            {{ $waters->links() }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- ============================================================== -->
                                                    <!-- End PAge Content -->
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
        $(
            $("#floorStoreForm").submit(() => {
                //event.preventDefault()
            })
        )

    </script>
@stop
