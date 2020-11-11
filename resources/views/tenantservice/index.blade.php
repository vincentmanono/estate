@extends('layouts.admin')
@section('content')

<!-- ============================================================== -->
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
                        <h4 class="text-themecolor">Tenant Requests </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Requests</li>
                            </ol>
                            {{--  <a type="button" href="{{ route('property.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>  --}}
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
                                                <h4 class="card-title">Requests Table</h4>
                                                {{-- <h6 class="card-subtitle">Data table example</h6> --}}
                                                <a href="{{ route('home') }}"class="btn btn-primary" style="float: right;" >  Back</a>
                                                <div class="table-responsive m-t-40">
                                                    <table id="myTable" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Type</th>
                                                                <th>Phone</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($properties as $property)

                                                                <tr>                                                                <td>#</td>
                                                                        <td>#</td>
                                                                        <td> <a href="tel:{{$property->phone}}" style="color: blue">{{$property->phone}}</a></td>
                                                                        <td><a href="mailto:{{$property->email}}" style="color: blue">{{$property->email}}</a> </td>
                                                                        <td class="row">
                                                                        <a href="{{route('property.edit',$property->id)}}" style="margin-left: 4%;margin-right:4%;" class=" btn btn btn-info" >Edit</a>
                                                                        <form action="{{ route('property.destroy',$property->id) }}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                        </td>
                                                                    </tr>
                                                            @endforeach
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Type</th>
                                                                        <th>Phone</th>
                                                                        <th>Email</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            {{--  {{ $propertys->links() }}  --}}
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
