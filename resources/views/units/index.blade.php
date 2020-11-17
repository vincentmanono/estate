@extends('layouts.admin')
@section('content')

    <!-- ============================================================== -->
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
                    <h4 class="text-themecolor">Blank Page</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                        <a href="{{ route('unit.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                                class="fa fa-plus-circle"></i> Create New</a>
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
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">All Units Records</h4>
                                                            {{-- <h6 class="card-subtitle">
                                                                Data table example</h6> --}}
                                                            <a href="{{ route('home') }}" class="btn btn-primary"
                                                                style="float: right;"> Back</a>
                                                            <div class="table-responsive m-t-40">
                                                                <table id="myTable"
                                                                    class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Branch</th>
                                                                            <th>Property</th>
                                                                            <th>Unit</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if ($param == 'owner')
                                                                            @foreach ($units as $unit)

                                                                                <tr>
                                                                                    <td>{{ $unit->property->branch->name }}
                                                                                    </td>
                                                                                    <td>{{ $unit->property->name }}</td>
                                                                                    <td>{{ $unit->name }}</td>
                                                                                    <td >

                                                                                        @if ($unit->status)
                                                                                        <span class="badge badge-pill badge-success">Leased</span>
                                                                                        @else
                                                                                        <span class="badge badge-pill badge-info">Vacant</span>
                                                                                        @endif

                                                                                    </td>

                                                                                    <td class="row">
                                                                                        <a class="btn btn-info btn-sm"
                                                                                            href="{{ route('unit.show', $unit->id) }}"
                                                                                            data-toggle="tooltip"
                                                                                            title="View">
                                                                                            <i class="ti-eye"></i> View</a>
                                                                                        <a style="margin-left: 2%;margin-right:2%; "
                                                                                            class="btn btn-success btn-sm "
                                                                                            href="{{ route('unit.edit', $unit->id) }}"
                                                                                            data-toggle="tooltip"
                                                                                            title="Edit">
                                                                                            <i
                                                                                                class="ti-marker-alt"></i>Edit</a>

                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            @forelse ($properties as $property)
                                                                                @foreach ($property->units as $unit)
                                                                                    <tr>
                                                                                        <td>{{ $unit->property->branch->name }}
                                                                                        </td>
                                                                                        <td>{{ $unit->property->name }}</td>
                                                                                        <td>{{ $unit->name }}</td>
                                                                                        <td >

                                                                                            @if ($unit->status)
                                                                                            <span class="badge badge-pill badge-success">Leased</span>
                                                                                            @else
                                                                                            <span class="badge badge-pill badge-info">Vacant</span>
                                                                                            @endif

                                                                                        </td>

                                                                                        <td class="row">
                                                                                            <a class="btn btn-info btn-sm"
                                                                                                href="{{ route('unit.show', $unit->id) }}"
                                                                                                data-toggle="tooltip"
                                                                                                title="View"> <i
                                                                                                    class="ti-eye"></i> View</a>
                                                                                            <a style="margin-left: 2%;margin-right:2%; "
                                                                                                class="btn btn-success btn-sm "
                                                                                                href="{{ route('unit.edit', $unit->id) }}"
                                                                                                data-toggle="tooltip"
                                                                                                title="Edit"> <i
                                                                                                    class="ti-marker-alt"></i>Edit</a>

                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach

                                                                            @empty
                                                                                <td class="text text-info h2">Has no property
                                                                                    allocated to him/her</td>

                                                                        @endforelse
                                                                        @endif




                                                                        <thead>
                                                                            <tr>
                                                                                <th>Branch</th>
                                                                            <th>Property</th>
                                                                            <th>Unit</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                        {{-- {{ $units->links() }}
                                                        --}}
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
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
@endsection
