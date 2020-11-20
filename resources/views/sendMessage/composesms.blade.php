
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
                <h4 class="text-themecolor">Write message to System Users</h4>
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
                        <form action="{{ route('store.sms') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="users"> users to Receive</label>
                              <select  class="js-example-basic-single form-control" multiple name="phone[]" id="test" required>
                                  @foreach ($users as $user)
                                  <option value="{{ $user->phone }}" >{{ $user->name ."() ". $user->phone ." )"}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <textarea name="message" id="message"  placeholder="Write message her..."  class="form-control" cols="30" rows="10" required ></textarea>

                            </div>
                            <button type="submit" class="btn btn-info">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
@stop



