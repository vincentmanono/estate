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
                    @if (Auth::user()->type == 'owner' || Auth::user()->type == 'manager')

                        <h4 class="text-themecolor"> {{ $params }}</h4>
                    @else
                        <h4 class="text-themecolor">Tenant</h4>
                    @endif

                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                            @if (Auth::user()->type == 'owner' || Auth::user()->type == 'manager')

                                <li class="breadcrumb-item active">{{ $params }}</li>
                            @endif

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


                            @if (Auth::user()->type == 'owner' || Auth::user()->type == 'manager')
                                <h4 class="card-title">
                                    All {{ $params }}</h4>
                            @else
                                Tenant
                            @endif
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
                                            <th>email</th>
                                            <th>Phone</th>
                                            <th>Lease</th>
                                            <th>Unit</th>
                                            <th>Property</th>
                                            <th>Branch</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (auth()
            ->user()
            ->isOwner())
                                            @foreach ($leases as $lease)
                                                <tr>

                                                    <td>{{ $lease->user->name }}</td>

                                                    <td><a style="color: blue" href="mailto:{{ $lease->user->email }}">
                                                            {{ $lease->user->email }}</a></td>
                                                    <td><a style="color: blue"
                                                            href="tel:{{ $lease->user->phone }}">{{ $lease->user->phone }}</a>
                                                    </td>
                                                    <td>

                                                        @if ($lease->status == 1)
                                                            <span class="badge badge-pill badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{ $lease->unit->name }}
                                                    </td>
                                                    <td>
                                                        {{ $lease->unit->property->name }}
                                                    </td>
                                                    <td>
                                                        {{ $lease->unit->property->branch->name }}
                                                    </td>


                                                    <td>

                                                        <a href="{{ route('showUser', $lease->user->id) }}"
                                                            class=" waves-effect waves-light  btn btn-sm btn-info "><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <a href="{{ route('updateUser', $lease->user->id) }}"
                                                            class=" waves-effect waves-light  btn btn-sm btn-warning text text-white "><i
                                                                class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                                        <a href="" onclick="deleteUser()"
                                                            class=" waves-effect waves-light  btn btn-sm btn-danger text text-white ">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> </a>

                                                        <form id="deleteUser"
                                                            action="{{ route('deleteUser', $lease->user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method("DELETE")
                                                        </form>



                                                    </td>



                                                </tr>
                                            @endforeach

                                        @elseif( auth()->user()->isManager())

                                            @foreach ($properties as $property)

                                                @foreach ($property->leases as $lease)

                                                    <tr>

                                                        <td>{{ $lease->user->name }}</td>

                                                        <td><a style="color: blue" href="mailto:{{ $lease->user->email }}">
                                                                {{ $lease->user->email }}</a></td>
                                                        <td><a style="color: blue"
                                                                href="tel:{{ $lease->user->phone }}">{{ $lease->user->phone }}</a>
                                                        </td>
                                                        <td>

                                                            @if ($lease->status == 1)
                                                                <span class="badge badge-pill badge-success">Active</span>
                                                            @else
                                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            {{ $lease->unit->name }}
                                                        </td>
                                                        <td>
                                                            {{ $lease->unit->property->name }}
                                                        </td>
                                                        <td>
                                                            {{ $lease->unit->property->branch->name }}
                                                        </td>


                                                        <td>

                                                            <a href="{{ route('showUser', $lease->user->id) }}"
                                                                class=" waves-effect waves-light  btn btn-sm btn-info "><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                                            <a href="{{ route('updateUser', $lease->user->id) }}"
                                                                class=" waves-effect waves-light  btn btn-sm btn-warning text text-white "><i
                                                                    class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                                            <a href="" onclick="deleteUser()"
                                                                class=" waves-effect waves-light  btn btn-sm btn-danger text text-white ">
                                                                <i class="fa fa-trash" aria-hidden="true"></i> </a>

                                                            <form id="deleteUser"
                                                                action="{{ route('deleteUser', $lease->user->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method("DELETE")
                                                            </form>



                                                        </td>



                                                    </tr>


                                                @endforeach



                                            @endforeach


                                        @else


                                            @foreach (auth()->user()->leases as $lease)

                                                <tr>

                                                    <td>{{ $lease->user->name }}</td>

                                                    <td><a style="color: blue" href="mailto:{{ $lease->user->email }}">
                                                            {{ $lease->user->email }}</a></td>
                                                    <td><a style="color: blue"
                                                            href="tel:{{ $lease->user->phone }}">{{ $lease->user->phone }}</a>
                                                    </td>
                                                    <td>

                                                        @if ($lease->status == 1)
                                                            <span class="badge badge-pill badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{ $lease->unit->name }}
                                                    </td>
                                                    <td>
                                                        {{ $lease->unit->property->name }}
                                                    </td>
                                                    <td>
                                                        {{ $lease->unit->property->branch->name }}
                                                    </td>


                                                    <td>

                                                        <a href="{{ route('showUser', $lease->user->id) }}"
                                                            class=" waves-effect waves-light  btn btn-sm btn-info "><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <a href="{{ route('updateUser', $lease->user->id) }}"
                                                            class=" waves-effect waves-light  btn btn-sm btn-warning text text-white "><i
                                                                class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                                        <a href="" onclick="deleteUser()"
                                                            class=" waves-effect waves-light  btn btn-sm btn-danger text text-white ">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> </a>

                                                        <form id="deleteUser"
                                                            action="{{ route('deleteUser', $lease->user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method("DELETE")
                                                        </form>



                                                    </td>



                                                </tr>

                                            @endforeach


                                        @endif



                                    </tbody>
                                    <tfoot>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Lease</th>
                                        <th>Unit</th>
                                        <th>Property</th>
                                        <th>Branch</th>
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
        function deleteUser() {
            event.preventDefault()
            if (confirm("Are you sure you need to delete this user ?")) {
                document.getElementById("deleteUser").submit()
            }
        }

    </script>
@stop
