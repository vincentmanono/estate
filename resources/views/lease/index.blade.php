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
                <h4 class="text-themecolor">Lease List</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Lease</li>
                    </ol>
                    <a type="button" href="{{ route('lease.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">lease Table</h4>
                                                        {{-- <h6 class="card-subtitle">Data table example</h6> --}}
                                                        <a href="{{ route('home') }}"class="btn btn-primary" style="float: right;" >  Back</a>
                                                        <div class="table-responsive m-t-40">
                                                            <table id="myTable" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Property</th>
                                                                        <th>Unit</th>
                                                                        <th>Tenant</th>
                                                                        <th>Status</th>
                                                                        <th>Lease Form</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($leases as $lease)

                                                                    <tr>
                                                                        <td>{{ $lease->unit->property->name }}</td>
                                                                    <td>{{$lease->unit->name}}</td>
                                                                    <td>{{$lease->user->name}}</td>
                                                                    <td>

                                                                        @if ($lease->status == 1)
                                                                        <span class="badge badge-pill badge-info"> Active </span></a>
                                                                        @else
                                                                        <span class="badge badge-pill badge-danger"> Inactive </span></a>

                                                                        @endif

                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('lease.show',$lease->id)}}" style="margin-left: 4%;margin-right:4%;" class=" btn btn btn-info" >Read</a>

                                                                    </td>
                                                                    <td class="row">

                                                                    <a href="{{route('lease.edit',$lease->id)}}" style="margin-left: 4%;margin-right:4%;" class=" btn btn btn-success" >Edit</a>
                                                                    <form action="{{ route('lease.destroy',$lease->id) }}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                    </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Property</th>
                                                                            <th>Unit</th>
                                                                            <th>Tenant</th>
                                                                            <th>Status</th>
                                                                            <th>Lease Form</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    {{--  {{ $leases->links() }}  --}}
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
