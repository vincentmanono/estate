@extends('layouts.admin')
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
                    <h4 class="text-themecolor">All Properties</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Properties</li>
                        </ol>
                        @if (Auth::user()->type =='owner' || Auth::user()->type =='manager')

                        <a href="{{ route('property.create') }}" type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>

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
                            <h4 class="card-title">Properties Table</h4>
                            {{-- <h6 class="card-subtitle">Data table example</h6>
                            --}}
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Address</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($properties as $property)

                                            <tr>
                                                <td> <img height="30px"
                                                        src= "  {{ Str::contains($property->image, 'http') ? $property->image : '/storage/property/' . $property->image }}"
                                                        alt="{{ $property->name }}">
                                                    </td>
                                                <td>{{ $property->name }}</td>
                                                <td>{{ $property->type }}</td>
                                                <td>{{ $property->address }}</td>

                                                <td class="row">
                                                    <a href="{{ route('property.show', $property->id) }}"
                                                        class=" btn btn btn-info">More</a>
                                                    @can('update', $property)
                                                        <a href="{{ route('property.edit', $property) }}"
                                                            style="margin-left: 4%;margin-right:4;"
                                                            class=" btn btn btn-warning">Edit</a>

                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Address</th>

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
