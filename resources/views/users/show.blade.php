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
                    <h4 class="text-themecolor"> Profile </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                        {{-- <button type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                            New</button> --}}
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="/storage/users/{{ $user->image }}" class="img-circle"
                                    width="150" />
                                <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                <h6 class="card-subtitle">{{ $user->type }}</h6>
                                {{-- <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                            <font class="font-medium">254</font>
                                        </a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                class="icon-picture"></i>
                                            <font class="font-medium">54</font>
                                        </a></div>
                                </div> --}}
                            </center>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>{{ $user->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                            <h6>{{ $user->address }}</h6>
                            <small class="text-muted p-t-30 db">KRA Number </small>
                            <h6>{{ $user->kra_pin }}</h6>
                            <small class="text-muted p-t-30 db">ID Number </small>
                            <h6>{{ $user->id_no }}</h6>

                            <small class="text-muted p-t-30 db">Number of Units Leased </small>
                            <h6>{{ $user->leases->count() }}</h6>




                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            @if ($user->type == 'tenant')
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#leases"
                                        role="tab">Leases</a> </li>
                            @endif

                            @if ($user->type == 'manager')
                                 <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#property"
                                        role="tab">Property</a> </li>
                            @endif


                        
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @if ($user->type == 'tenant')
                                <div class="tab-pane active" id="leases" role="tabpanel">
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
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user->leases as $lease)
                                                        <tr>
                                                            <td>{{ $lease->unit->property->name }}</td>
                                                            <td>{{ $lease->unit->name }}</td>
                                                            <td>
                                                                @if ($lease->unit->status)
                                                                    <span class="badge badge-success">Active</span>
                                                                @else
                                                                    <span class="badge badge-danger">Pending</span>
                                                                @endif

                                                            </td>
                                                            <td>

                                                                <a href="{{ route('tenantUnit', [$user->id, $lease->unit->id]) }}"
                                                                    class="btn waves-effect waves-light btn-rounded btn-info">View</a>
                                                                    @if (Auth::user()->type == 'owner' || Auth::user()->type == 'manager')

                                                                    <a name="" id=""
                                                                    class="btn waves-effect waves-light btn-rounded  btn-danger"
                                                                    href="#">Delete</a>@endif

                                                            </td>
                                                        </tr>

                                                    @endforeach


                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($user->type == 'manager')
                            <div class="tab-pane active" id="property" role="tabpanel">
                                <div class="card-body">
                                    <h4 class="card-title">Property Information</h4>
                                    <h6 class="card-subtitle">Property Information</code></h6>
                                    <div class="table-responsive">

                                        <table class="table table-hover table-inverse table-responsive">
                                            <thead>
                                                <tr>

                                                    <th>Branch</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Units</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->properties as $property)
                                                    <tr>
                                                        <td>{{ $property->branch->name }} </td>
                                                        <td>{{ $property->name}} </td>
                                                        <td>{{ $property->type }} </td>
                                                        <td>{{ $property->units->count() }} </td>

                                                        <td>
                                                            <a href="{{ route('manager.property', $property->id) }}"
                                                                class=" waves-effect waves-light  btn btn-sm btn-info "><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                <a href="#"
                                                                    class=" waves-effect waves-light  btn btn-sm btn-warning text text-white "><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                                                    <a href="" onclick="#"
                                                                        class=" waves-effect waves-light  btn btn-sm btn-danger text text-white "> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                        </td>
                                                    </tr>
                                                @endforeach



                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        @endif




                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a>
                            </li>
                            <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a>
                            </li>
                            <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a>
                            </li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img"
                                        class="img-circle"> <span>Varun Dhavan <small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img"
                                        class="img-circle"> <span>Genelia Deshmukh <small
                                            class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img"
                                        class="img-circle"> <span>Ritesh Deshmukh <small
                                            class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img"
                                        class="img-circle"> <span>Arijit Sinh <small
                                            class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img"
                                        class="img-circle"> <span>Govinda Star <small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img"
                                        class="img-circle"> <span>John Abraham<small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img"
                                        class="img-circle"> <span>Hritik Roshan<small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img"
                                        class="img-circle"> <span>Pwandeep rajan <small
                                            class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
@stop
