@extends('layouts.admin')

@section('title')
    <title>Chief Properties - {{ $params }}</title>
@stop

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
                    <h4 class="text-themecolor">  {{ $params }}</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $params }}</li>
                        </ol>

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
                            <h4 class="card-title">All {{ $params }}</h4>
                            {{-- <h6 class="card-subtitle">Data table example</h6>
                            --}}
                            <div style="float: right">
                                <a class="btn btn-sm btn-primary" href="{{ route('home') }}">Back</a>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>

                                                <td>



                                                    @if ($user->type  == "owner" )
                                                        <span class="badge badge-pill badge-primary"> Owner</span>
                                                    @elseif ($user->type  == "manager" )
                                                        <span class="badge badge-pill badge-info">Manager</span>
                                                    @elseif ($user->type  == "tenant" )
                                                    <span class="badge badge-pill badge-dark">Tenant</span>
                                                    @else
                                                    <a href="mailto:info@lagaster.com" title="Email lagaster developers" >
                                                    <span class="badge badge-pill badge-danger">  Contact Lagaster </span></a>
                                                    @endif



                                                </td>

                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>


                                                <td>

                                                    <a href="{{ route('showUser', $user->id) }}"
                                                        class=" waves-effect waves-light  btn btn-sm btn-info "><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <a href="{{ route('updateUser', $user->id) }}"
                                                            class=" waves-effect waves-light  btn btn-sm btn-warning text text-white "><i class="fa fa-pencil-square" aria-hidden="true">Edit</i></a>

                                                            <a href="" onclick="deleteUser()"
                                                                class=" waves-effect waves-light  btn btn-sm btn-danger text text-white "> <i class="fa fa-trash" aria-hidden="true"></i> </a>

                                                                <form id="deleteUser" action="{{ route('deleteUser', $user->id) }}" method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                </form>



                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                    <tfoot>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tfoot>
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
            <!-- .right-sidebar -->

            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
@stop

@section('extraScripts')
    <script>
        function deleteUser(){
            event.preventDefault()
            if( confirm("Are you sure you need to delete this user ?") ){
                document.getElementById("deleteUser").submit()
            }
        }
    </script>
@stop

