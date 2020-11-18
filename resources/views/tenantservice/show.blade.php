@extends('layouts.admin')

@section('title')
<title>Tenant Service</title>
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
                <h4 class="text-themecolor">Tenant Service</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Service </li>
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


                        <!-- Start Page Content -->
                        <a href="{{ route('tenantservice.index') }}" class="btn btn-primary" >Back</a>
                        <!-- ============================================================== -->
                        <div class="row"></div>
                            <div class="col-12">
                                <div class="card m-b-0">
                                    <!-- .chat-row -->
                                    {{--  <div class="chat-main-box">  --}}
                                        <!-- .chat-left-panel -->
                                        {{--  <div class="chat-left-aside">
                                            <div class="open-panel"><i class="ti-angle-right"></i></div>

                                        </div>  --}}

                                        <!-- .chat-left-panel -->
                                        <!-- .chat-right-panel -->
                                        <div class="chat-right-aside">
                                            <div class="chat-main-header">
                                                <div class="p-3 b-b ">
                                                   <div class="row">
                                                    <h4 class="box-title" style="margin-right: 4%;">Service Message</h4>

                                                    @if ($service->status == 1)

                                                    <span class="badge badge-pill badge-info">Approved</span>

                                                    @else

                                                    <span class="badge badge-pill badge-danger">Declined</span>

                                                    @endif
                                                   </div>



                                                    <div style="float:right; " class="row" >
                                                        @can('acceptDecline', $service)

                                                        @if ($service->status ==0)




                                                      <form action="{{ route('tenantservice.status',$service) }}" method="post">
                                                        @csrf
                                                        @method('PUT')

                                                        <input type="number" name="status" value="1"
                                                        hidden>
                                                        <button type="submit" class="btn  btn-success">Approve</button>
                                                    </form>

                                                      @else
                                                      <form action="{{ route('tenantservice.status',$service) }}" method="post">
                                                        @csrf
                                                        @method('PUT')

                                                        <input type="number" name="status" value="0"
                                                        hidden>
                                                        <button type="submit" class="btn  btn-success">Decline</button>
                                                    </form>

                                                      @endif



                                                        @endcan

                                                            @can('delete', $service)


                                                        <form action="{{ route('tenantservice.destroy',$service->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger " style="margin-left:4%;">Delete</button>
                                                        </form>

                                                            @endcan

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="chat-rbox">
                                                <ul class="chat-list p-3">
                                                    <!--chat Row -->
                                                    <li>
                                                        <div class="chat-img"><img src="/storage/users/{{ $service->user->image }}" alt="user" /></div>
                                                        <div class="chat-content">
                                                            <h5>{{ $service->user->name }}</h5>
                                                            <div class="box bg-light-info">{{ $service->message }}</div>
                                                            <div class="chat-time">created on:<h5>{{ $service->created_at }}</h5></div>
                                                        </div>
                                                    </li>
                                                    <!--chat Row -->
                                                </ul>
                                            </div>

                                        </div>
                                        <!-- .chat-right-panel -->
                                    {{--  </div>  --}}
                                    <!-- /.chat-row -->
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->



                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

@endsection
