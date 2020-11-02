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
                    {{--  <a href="{{ route('create.application') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>  --}}
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
                                {{-- <h6 class="card-subtitle">Data table example</h6> --}}
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
                                                <th>Property</th>
                                                <th>ACTIONS</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($applications as $application)
                                            <tr>
                                                    <td>{{ $application->identity }}</td>
                                                    <td>{{ $application->name }}</td>
                                                    <td> <a style="color: blue;" href="mailto:{{ $application->email }}">{{ $application->email }}</a></td>
                                                    <td><a style="color: blue;" href="tel:{{ $application->phone }}">{{ $application->phone }}</a></td>

                                                    {{--  @foreach ($properties as $property)

                                                    @if($property->id == $application->id)  --}}


                                                    <td>{{ $application->property->name }}</td>
                                                    {{--  @endif
                                                    @endforeach  --}}


                                                    <td class="row" >

                                                        {{--  <a class="btn btn-success " href="{{ route('singleapplication',$application->id) }}" data-toggle="tooltip" title="View"> <i class="ti-eye"></i> View</a>
                                                        <a style="margin-left: 2%;margin-right:2%; " class="btn btn-warning " href="{{ route('editapplication',$application->id) }}" data-toggle="tooltip" title="Edit"> <i class="ti-marker-alt"></i>Edit</a>
                                                        <form action="{{ route('destroy.application',$application->id) }}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger" title="Delete"  data-toggle="tooltip"><i class="ti-trash"></i> Delete</button>
                                                        </form>  --}}
                                                    </td>

                                            </tr>
                                                @endforeach

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
