@extends('layouts.admin')


@section('title')
    <title>Chief Properties - {{ $params }}</title>
@stop

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
                <h4 class="text-themecolor">All {{ $params }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"> {{ $params }}</li>
                    </ol>
                    <a href="{{ route('rent.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                    <div class="card-body flex-baseline">
                       
                      
                            <form class="row" action="{{ route('taxSearched') }}" method="GET">
                                {{-- @csrf --}}
                               
                                
                                <div class="form-group col-3 ">
                                  <label for="">Properties</label>
                                  <select class="form-control select2" name="property" id="property">
                                     
                                      
                                    <option selected >Select property</option>
                                    @foreach ($properties as $pro)
                                        <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Start date</label>
                                    <input type="date" name="startdate" id="" class="form-control" placeholder="start date" >
                                </div>
                                <div class="form-group col-3">
                                    <label for="">End date</label>
                                    <input type="date" name="enddate" id="" class="form-control" placeholder="End date" >
                                </div>
                                <button style="width: 100px ;height: 36px;" type="submit" class="btn btn-info btn-sm  ">Search</button>

                            </form>

                            @if ( $data == "fetch")

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title"> {{ $params }} Data Export</h4>
                                            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                            <div class="table-responsive m-t-40">
                                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Property </th>
                                                            <th>Total Rent</th>
                                                            <th>Total service</th>
                                                            <th>Taxable Rent</th>
                                                            <th>Tax</th>
                                                            <th>Gross</th>
                                                            <th>Date </th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Property </th>
                                                            <th>Total Rent</th>
                                                            <th>Total service</th>
                                                            <th>Taxable Rent</th>
                                                            <th>Tax</th>
                                                            <th>Gross</th>
                                                            <th>Date </th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @foreach ($alltax as $tax)
                                                        <tr>
                                                            <td>{{ $tax->property->name }}</td>
                                                            <td>{{ number_format($tax->total_rent) }}</td>
                                                            <td>{{ number_format($tax->total_service) }}</td>
                                                            <td>{{ number_format($tax->taxable_amount) }}</td>
                                                            <td>{{ number_format($tax->tax) }}</td>
                                                            <td>{{ number_format($tax->gross) }}</td>
                                                            <td>{{$tax->created_at->format(" M - Y")}}</td>
    
                                                        @endforeach
    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                           
                                
                            @endif


                            




                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->











                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

@endsection
