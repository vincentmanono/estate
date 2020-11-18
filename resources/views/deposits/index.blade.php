@extends('layouts.admin')

@section('title')
    <title>Chief Properties -{{ 'All Units' . $param }}</title>
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
                    <h4 class="text-themecolor">All Units deposit</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">deposit</li>
                        </ol>
                        <a href="{{ route('deposit.create') }}" type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New</a>
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
                            <h4 class="card-title">Deposits Table</h4>
                            {{-- <h6 class="card-subtitle">Data table example</h6>
                            --}}
                            <a href="{{ route('home') }}" style="float: right;" class="btn btn-sm btn-primary">Back</a>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Date Paid</th>
                                            <th>Unit Name</th>
                                            <th>Tenant Name</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (Auth::User()->isOwner() || Auth::user()->isTenant())

                                            @foreach ($deposits as $deposit)

                                                <tr>
                                                    <td>{{ $deposit->amount }}</td>
                                                    <td>{{ $deposit->date }}</td>
                                                    <td>{{ $deposit->unit->name }}</td>
                                                    <td>{{ $deposit->user->name }}</td>
                                                    <td>{{ $deposit->status }}</td>
                                                    <td class="row">
                                                        @can('update', $deposit)
                                                            <a href="{{ route('deposit.edit', $deposit->id) }}"
                                                                style="margin-right: 3%;" class=" btn btn btn-info">Edit</a>
                                                        @endcan


                                                        @can('delete', $deposit)


                                                            <form action="{{ route('deposit.destroy', $deposit->id) }}"
                                                                enctype="multipart/form-data" method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                                                            </form>


                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach


                                        @else


                                            @foreach ($properties as $property)
                                                @foreach ($property->units as $unit)

                                                    @foreach ($unit->deposits as $deposit)

                                                        <tr>
                                                            <td>{{ $deposit->amount }}</td>
                                                            <td>{{ $deposit->date }}</td>
                                                            <td>{{ $deposit->unit->name }}</td>
                                                            <td>{{ $deposit->user->name }}</td>
                                                            <td>{{ $deposit->status }}</td>
                                                            <td class="row">
                                                                @can('update', $deposit)
                                                                    <a href="{{ route('deposit.edit', $deposit->id) }}"
                                                                        style="margin-right: 3%;"
                                                                        class=" btn btn btn-info">Edit</a>
                                                                @endcan




                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                @endforeach

                                            @endforeach




                                        @endif



                                        <thead>
                                            <tr>
                                                <th>Amount</th>
                                                <th>Date Paid</th>
                                                <th>Unit Name</th>
                                                <th>Tenant Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </tbody>
                                </table>
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
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->


@endsection
