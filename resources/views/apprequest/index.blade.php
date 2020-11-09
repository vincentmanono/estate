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
                    <h4 class="text-themecolor">All applications</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Application Details</li>
                        </ol>
                        {{-- <a href="{{ route('create.application') }}" type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
                        --}}
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
                            <!-- Start Page Content -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">applications Table</h4>
                                            {{-- <h6 class="card-subtitle">Data table example
                                            </h6> --}}
                                            <div style="float: right">
                                                <a class="btn btn-sm btn-primary" href="{{ route('home') }}">Back</a>
                                            </div>
                                            <div class="table-responsive m-t-40">
                                                <table id="myTable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Status</th>
                                                            <th>Property</th>
                                                            <th>ACTIONS</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if ( $param == "owner" )
                                                        @foreach ($applications as $application)
                                                        <tr>
                                                            <td>{{ $application->identity }}</td>
                                                            <td>{{ $application->name }}</td>
                                                            <td> <a style="color: blue;"
                                                                    href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                                                            </td>
                                                            <td><a style="color: blue;"
                                                                    href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                                                            </td>
                                                            <th>

                                                                @if ($application->status == 1)
                                                                    <span class="badge badge-pill badge-info">
                                                                        Approved
                                                                    </span></a>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">
                                                                        Pending
                                                                    </span></a>

                                                                @endif
                                                            </th>
                                                            <td>{{ $application->property->name }}</td>
                                                            <td class="row">


                                                                @if ($application->status == 1)
                                                                    <form
                                                                        action="{{ route('application.status', $application) }}"
                                                                        method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <input type="number" name="status" value="0"
                                                                            hidden>
                                                                        <button class="btn btn-sm  btn-danger"
                                                                            type="submit">Decline</button>
                                                                    </form>

                                                                @else
                                                                    <form
                                                                        action="{{ route('application.status', $application) }}"
                                                                        method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <input type="number" name="status" value="1"
                                                                            hidden>
                                                                        <button class="btn btn-sm  btn-success"
                                                                            type="submit">Approve</button>
                                                                    </form>

                                                                @endif

                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                        @else
                                                             @foreach ($properties as $property)
                                                            @foreach ($property->applications as $application)
                                                                <tr>
                                                                    <td>{{ $application->identity }}</td>
                                                                    <td>{{ $application->name }}</td>
                                                                    <td> <a style="color: blue;"
                                                                            href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                                                                    </td>
                                                                    <td><a style="color: blue;"
                                                                            href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                                                                    </td>
                                                                    <th>

                                                                        @if ($application->status == 1)
                                                                            <span class="badge badge-pill badge-info">
                                                                                Approved
                                                                            </span></a>
                                                                        @else
                                                                            <span class="badge badge-pill badge-danger">
                                                                                Pending
                                                                            </span></a>

                                                                        @endif
                                                                    </th>
                                                                    <td>{{ $application->property->name }}</td>
                                                                    <td class="row">


                                                                        @if ($application->status == 1)
                                                                            <form
                                                                                action="{{ route('application.status', $application) }}"
                                                                                method="POST">
                                                                                @method('PUT')
                                                                                @csrf
                                                                                <input type="number" name="status" value="0"
                                                                                    hidden>
                                                                                <button class="btn btn-sm  btn-danger"
                                                                                    type="submit">Decline</button>
                                                                            </form>

                                                                        @else
                                                                            <form
                                                                                action="{{ route('application.status', $application) }}"
                                                                                method="POST">
                                                                                @method('PUT')
                                                                                @csrf
                                                                                <input type="number" name="status" value="1"
                                                                                    hidden>
                                                                                <button class="btn btn-sm  btn-success"
                                                                                    type="submit">Approve</button>
                                                                            </form>

                                                                        @endif

                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                        @endif






                                                    </tbody>
                                                    <tfoot>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Property</th>
                                                        <th>ACTIONS</th>
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

@endsection
