{{--  @extends('layouts.admin')
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
                <h4 class="text-themecolor">Blank Page</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
                            @foreach ($rents as $allrent)

                            @if($allrent->id == $rent->id)


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

                            @endif

                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- /.row -->
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























  --}}
