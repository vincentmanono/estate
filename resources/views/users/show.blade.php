@extends('layouts.admin')

@section('title')
    <title>Chief Properties - user</title>
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
                    <h4 class="text-themecolor">User</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">System User</li>
                        </ol>
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15">
                            <i class="fa fa-plus-circle"></i> Create New
                        </button>
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

                <div class="card col-md-6 col-xs-12 ">
                    <img class="card-img-top" height="200" width="100"src="{{ (Str::contains($user->image,'http') ? $user->image:'/storage/users/' . $user->image ) }}" alt="">
                    <div class="card-body">
                        <h5 class="card-title text text-capitalize">{{ $user->name }} - <strong>{{ $user->type }}</strong>
                        </h5>
                        <p class="card-text">
                        <ul class="list-group ">
                            <li class="list-group-item ">Phone <span
                                    class="float-right text text-bold text-capitalize"> {{ $user->phone }}</span> </li>
                            <li class="list-group-item ">Email <span
                                    class="float-right text text-bold text-capitalize"> {{ $user->email }}</span> </li>
                            <li class="list-group-item ">Address <span
                                    class="float-right text text-bold text-capitalize"> {{ $user->address }}</span>
                            </li>
                            <li class="list-group-item ">KRA Number <span
                                    class="float-right text text-bold text-capitalize"> {{ $user->kra_pin }}</span>
                            </li>
                            <li class="list-group-item ">ID Number <span
                                    class="float-right text text-bold text-capitalize"> {{ $user->id_no }}</span> </li>
                        </ul>
                        </p>
                    </div>
                </div>

                @if ($user->type == 'tenant')
                    <div class="card col-md-6 col-xs-12">
                        <div class="card-body">
                            <h4 class="card-title">Lease Information</h4>
                            <h6 class="card-subtitle">Units Tenant Leased</code></h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Property</th>
                                            <th>Unit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->leases as $lease)
                                            <tr>
                                                <td>{{ $lease->unit->property->name }}</td>
                                                <td>{{ $lease->unit->name }}</td>
                                                <td>{{ $lease->unit->status ? 'Active' : 'Pendding' }}</td>
                                                <td>
                                                    <a name="" id="" class="btn btn-danger" href="#"
                                                        role="button">Delete</a>
                                                </td>
                                            </tr>

                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                @else

                    <div class="card col-md-6 col-xs-12">
                        <div class="card-body">
                            <h4 class="card-title">Property Information</h4>
                            <h6 class="card-subtitle">Property managed</code></h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Branch</th>
                                            <th> Name</th>
                                            <th>Type</th>
                                            <th>Year of construction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->properties as $property)
                                            <tr>
                                                <td> <img src="/assets/images/property/prop6.jpg" width="80" alt=""
                                                        sizes=""></td>
                                                <td>{{ $property->branch->name }}</td>
                                                <td>{{ $property->name }}</td>
                                                <td>{{ $property->type }}</td>
                                                <td> {{ $property->year_of_construction }} </td>
                                                <td class="row">
                                                    <a name="" id="" class="btn btn-info col" href="#"
                                                        role="button">View</a>

                                                    <a name="" id="" class="btn btn-danger col " href="#"
                                                        role="button">Fire</a>

                                                </td>
                                            </tr>

                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                @endif


                <div class="row">
                     <a name="" id="" class="btn waves-effect waves-light btn-info" href="{{ route('editUser', $user->id) }}"
                    role="button"> Edit User </a>

                <!-- Button trigger modal -->
                <button type="button" class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target="#modelId">
                    Delete Account
                </button>
                </div>





                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>Are you sure you need to delete this account ?</div>
                                <form action="{{ route('deleteUser', $user->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@stop
