
@extends('layouts.admin')

@section('title')
<title>Chief Properties -{{ $param }}</title>

@endsection

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
                <h4 class="text-themecolor">Real Estate Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Real Estate Dashboard</li>
                    </ol>
                    {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i> Create New</button> --}}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <!--.row -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">All Branches</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-control-shuffle text-info"></i></h1>

                            <div class="ml-auto">
                                <h1 class="text-muted">{{ $branchcount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card bg-info" >
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">All Properties </h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-home text-purple"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">{{ $propertycount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card bg-success">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Occupied Units</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-lock text-danger"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">{{ $leasecount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Vacant Units</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-unlock text-success"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">{{ $unleasecount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row ">
            <div class="col-lg-8 ">

               <div class="row card card-body">
                   <h5 class="card-title">Managers</h5>
                   <div class="row">
                   @foreach ($managers as $manager)
                   <div class="col-md-4">
                    <a href="{{ route('showUser',$manager->id) }}" style="color: black">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="/storage/users/{{ $manager->image }}" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10">{{ $manager->name }}</h4><small class="text-muted p-t-30 db">Phone</small>
                            <h6 class="card-subtitle">{{ $manager->phone }}</h6><hr>
                            <h5 class="card-title">Property(s) In Charge</h5>

                            @foreach ($manager->properties as $property)
                            <small class="text-muted p-t-30 db">{{ $property->name }}</small>
                            @endforeach

                        </center>
                    </div>
                    </a>
               </div>
                   @endforeach
                </div>
               </div>

            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-15">
                            <div class="card-body">
                                <h5 class="card-title">Total Active Paid Deposit</h5>
                                <div class="row">
                                    <div class="col-9 m-t-30">
                                        <h1 class="text-info">Ksh {{ number_format($depositsum , 2,'.',',')  }}  </h1>
                                        <p class="text-muted">{{ (date('d,M,Y') )}}</p>
                                    </div>
                                    <div class="col-3">
                                        <div id="sparkline2dash" class="text-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card bg-purple m-b-15">
                            <div class="card-body">
                                <h5 class="text-white card-title">  Total Active Paid Rent</h5>
                                <div class="row">
                                    <div class="col-9 m-t-30">
                                        <h1 class="text-white">Ksh {{ number_format($rentsum , 2,'.',',')  }}</h1>
                                        <p class="text-white"> For :
                                            <span>  {{ (date('M , Y') )}}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-6">
                                        <div id="sales1" class="text-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Comment - table -->
        <!-- ============================================================== -->
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">PROPERTY OVERVIEW</h5>
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                    <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Photo</th>
                                                <th>Address</th>

                                                {{-- <th>Status</th> --}}
                                                <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $property)
                                    <tr>
                                       <td>{{ $property->name }}</td>
                                       <td>{{ $property->type }}</td>
                                       <td> <img height="30px"
                                        src= "  {{ Str::contains($property->image, 'http') ? $property->image : '/storage/property/' . $property->image }}"
                                        alt="{{ $property->name }}">
                                        </td>
                                       {{--  <td> <img src="/storage/property/{{ $property->image }}" alt="{{ $property->name }}" width="80"> </td>  --}}
                                       <td>{{ $property->address }}</td>

                                       {{-- <td> <span class="label label-success font-weight-100">Paid</span> </td> --}}
                                       <td class="row">
                                        <a  style="margin-right: 2%;" class="btn   btn-success " href="{{ route('property.show',$property->id) }}" data-toggle="tooltip" title="View"> <i class="ti-eye"></i> View</a>
                                        <a  class="btn  btn-info " href="{{ route('property.edit',$property->id) }}" data-toggle="tooltip" title="Edit"> <i class="ti-marker-alt"></i>Edit</a>
                                        </td>
                                   </tr>
                                   @endforeach
                                </tbody>
                                <thead>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Photo</th>
                                                <th>Address</th>

                                                {{-- <th>Status</th> --}}
                                                <th>Actions</th>
                                </thead>
                            </table>
                        </div>
                        <div style="margin-left: 40%">
                            {{ $properties->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End Comment - chats -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        {{-- <!-- .row  -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card bg-light">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle"
                                            src="/assets/images/users/agent.jpg"></a>
                                    <h4 class="card-title m-t-10">Jon Doe</h4>
                                    <h6 class="text-muted">Agent of Property</h6>
                                    <div class="p-20">
                                        <i class="fa fa-phone text-danger p-r-10" aria-hidden="true"></i>
                                        800-1800-24657
                                        <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10"
                                            aria-hidden="true"></i> jon@realestate.com
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body bg-white">
                                <h5 class="card-title">REQUEST INQUIRY</h5>
                                <form class="m-t-30">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="E-Mail">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3"
                                            placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-rounded">Submit
                                            Request</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">RECENT PROPERTIES</h5>
                        <div class="d-flex no-block m-b-20 m-t-30">
                            <div class="p-r-15">
                                <a href="javascript:void(0)"><img src="/assets/images/property/prop1.jpeg"
                                        alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">4 BHK
                                        Avenue Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                        <div class="d-flex no-block m-b-20">
                            <div class="p-r-15">
                                <a href="javascript:void(0)"><img src="/assets/images/property/prop2.jpeg"
                                        alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">2 BHK
                                        Masto Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                        <div class="d-flex no-block m-b-20">
                            <div class="p-r-15">
                                <a href="javascript:void(0)"><img src="/assets/images/property/prop3.jpeg"
                                        alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">5 BHK
                                        Kalash Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                        <div class="d-flex no-block m-b-20">
                            <div class="p-r-15">
                                <a href="javascript:void(0)"><img src="/assets/images/property/prop4.jpeg"
                                        alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">1 BHK
                                        Amidhar Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row  --> --}}
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default-dark"
                                class="default-dark-theme ">7</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-green-dark"
                                class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue-dark"
                                class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple-dark"
                                class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna-dark"
                                class="megna-dark-theme ">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/1.jpg" alt="user-img"
                                    class="img-circle"> <span>Varun Dhavan <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/2.jpg" alt="user-img"
                                    class="img-circle"> <span>Genelia Deshmukh <small
                                        class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/3.jpg" alt="user-img"
                                    class="img-circle"> <span>Ritesh Deshmukh <small
                                        class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/4.jpg" alt="user-img"
                                    class="img-circle"> <span>Arijit Sinh <small
                                        class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/5.jpg" alt="user-img"
                                    class="img-circle"> <span>Govinda Star <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/6.jpg" alt="user-img"
                                    class="img-circle"> <span>John Abraham<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/7.jpg" alt="user-img"
                                    class="img-circle"> <span>Hritik Roshan<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="/assets/images/users/8.jpg" alt="user-img"
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
