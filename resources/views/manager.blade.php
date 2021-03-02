@extends('layouts.admin')
@section('title')
<title>Chief Properties -{{ $param }}</title>
@endsection
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
                <h4 class="text-themecolor">Manager Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">ChiefProperties Manager</li>
                    </ol>
                    {{--  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>  --}}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="ti-home"></i></h3>
                                    <p class="text-muted">PROPERTIES INCHARGE</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">{{ $propertiescount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="ti-home"></i></h3>
                                    <p class="text-muted">UNITS INCHARGE</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{ $unitscount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="ti-unlock"></i></h3>
                                    <p class="text-muted">VACANT UNITS</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">{{ $vacantunit }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="ti-lock"></i></h3>
                                    <p class="text-muted">OCCUPIED UNITS</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">{{ $occupiedunit }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Comment - table -->

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- .row  -->
        <div class="row">
            {{-- <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <div class="card bg-light">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-12">


                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tenant Requests</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Property</th>
                                                    <th>Unit</th>
                                                    <th>Message</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($managerproperties as $property)

                                               @foreach ($property->tenantServicesRequests as $service)

                                               <tr>
                                                <td>{{ $property->name }}</td>
                                                <td>{{ $service->unit->name }}</td>
                                                <td>{{ Str::limit($service->message,20) }}</td>
                                                <td>
                                                    @if ($service->status == 1)
                                                    <span class="badge badge-pill badge-info">
                                                        Approved
                                                    </span>
                                                @elseif($service->status==0)
                                                    <span class="badge badge-pill badge-danger">
                                                        Declined
                                                    </span>
                                                @else
                                                <span class="badge badge-pill badge-warning">
                                                    Pending
                                                </span>
                                                @endif
                                                </td>
                                                <td><a class="btn btn-sm btn-info" href="{{ route('tenantservice.show',$service->id) }}">More</a> </td>
                                            </tr>

                                               @endforeach

                                               @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div> --}}
            <div class=" col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">RECENT PROPERTIES</h5>
                       @foreach ($managerproperties as $property)

                       <div class="d-flex no-block m-b-20 m-t-30">
                        <div class="p-r-15">
                            <a href="javascript:void(0)"><img src="storage/property/{{ $property->image }}" alt="property" width="100"></a>
                        </div>
                        <div>
                            <h5 class="card-title m-b-5"><a href="javascript:void(0)" class="link">{{ $property->name }}</a></h5>
                            <span class="text-muted">{{ $property->created_at }} | {{ $property->user->name }}</span>
                        </div>
                    </div>

                       @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row  -->
        <!-- ============================================================== -->

        <!-- .row -->
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
        <!-- End Comment - chats -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->

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
