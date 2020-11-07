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
                <h4 class="text-themecolor">Real Estate Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Real Estate Dashboard</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Property Name</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-home text-info"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">480</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Unit  Name</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="icon-tag text-purple"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">169</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Rent Status</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="icon-basket text-danger"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">311</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Water Billing Status</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-wallet text-success"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">$8170</h1>
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
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex m-b-40 align-items-center">
                            <h5 class="card-title">PROPERTIES STATS</h5>
                            <div class="ml-auto">
                                <ul class="list-inline font-12">
                                    <li><i class="fa fa-circle text-cyan"></i> For Sale</li>
                                    <li><i class="fa fa-circle text-primary"></i> For Rent</li>
                                    <li><i class="fa fa-circle text-purple"></i> All</li>
                                </ul>
                            </div>
                        </div>
                        <div id="morris-bar-chart" style="height:352px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-15">
                            <div class="card-body">
                                <h5 class="card-title">PROPERTY SALES INCOME</h5>
                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <h1 class="text-info">$64057</h1>
                                        <p class="text-muted">APRIL 2017</p> <b>(150 Sales)</b> </div>
                                    <div class="col-6">
                                        <div id="sparkline2dash" class="text-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card bg-purple m-b-15">
                            <div class="card-body">
                                <h5 class="text-white card-title">PROPERTY ON RENT INCOME</h5>
                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <h1 class="text-white">$30447</h1>
                                        <p class="text-white">APRIL 2017</p> <b class="text-white">(110 Sales)</b> </div>
                                    <div class="col-md-6 col-sm-6 col-6">
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
                                        <th>Customer</th>
                                        <th>Order ID</th>
                                        <th>Photo</th>
                                        <th>Property</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Steave Jobs</td>
                                        <td>#85457898</td>
                                        <td> <img src="../assets/images/property/prop1.jpeg" alt="iMac" width="80"> </td>
                                        <td>Swanim villa</td>
                                        <td>Sold</td>
                                        <td>10-7-2017</td>
                                        <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                        <td><a href="javascript:void(0)" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Varun Dhavan</td>
                                        <td>#95457898</td>
                                        <td> <img src="../assets/images/property/prop2.jpeg" alt="iPhone" width="80"> </td>
                                        <td>River view home</td>
                                        <td>On Rent</td>
                                        <td>09-7-2017</td>
                                        <td> <span class="label label-warning font-weight-100">Pending</span> </td>
                                        <td><a href="javascript:void(0)" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Ritesh Desh</td>
                                        <td>#68457898</td>
                                        <td> <img src="../assets/images/property/prop3.jpeg" alt="apple_watch" width="80"> </td>
                                        <td>Gray Chair</td>
                                        <td>12</td>
                                        <td>08-7-2017</td>
                                        <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                        <td><a href="javascript:void(0)" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Hrithik</td>
                                        <td>#45457898</td>
                                        <td> <img src="../assets/images/property/prop3.jpeg" alt="mac_mouse" width="80"> </td>
                                        <td>Pure Wooden chair</td>
                                        <td>18</td>
                                        <td>02-7-2017</td>
                                        <td> <span class="label label-danger font-weight-100">Failed</span> </td>
                                        <td><a href="javascript:void(0)" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
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
        <!-- .row  -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card bg-light">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="../assets/images/users/agent.jpg"></a>
                                    <h4 class="card-title m-t-10">Jon Doe</h4>
                                    <h6 class="text-muted">Agent of Property</h6>
                                    <div class="p-20">
                                        <i class="fa fa-phone text-danger p-r-10" aria-hidden="true"></i> 800-1800-24657
                                        <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> jon@realestate.com
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
                                        <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-rounded">Submit Request</button>
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
                                <a href="javascript:void(0)"><img src="../assets/images/property/prop1.jpeg" alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">4 BHK Avenue Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                        <div class="d-flex no-block m-b-20">
                            <div class="p-r-15">
                                <a href="javascript:void(0)"><img src="../assets/images/property/prop2.jpeg" alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">2 BHK Masto Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                        <div class="d-flex no-block m-b-20">
                            <div class="p-r-15">
                                <a href="javascript:void(0)"><img src="../assets/images/property/prop3.jpeg" alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">5 BHK Kalash Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                        <div class="d-flex no-block m-b-20">
                            <div class="p-r-15">
                                <a href="javascript:void(0)"><img src="../assets/images/property/prop4.jpeg" alt="property" width="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">1 BHK Amidhar Street, Mountain View</a></h5>
                                <span class="text-muted">Oct 07, 2015 | Jon Doe</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row  -->
        <!-- ============================================================== -->
        <!-- End Page Content -->
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
