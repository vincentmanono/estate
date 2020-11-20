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
                <h4 class="text-themecolor">Email Details</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Email Details</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        @include('messages.messagesidebar')
                        <div class="col-xlg-10 col-lg-9 col-md-8 bg-light border-left">
                            <div class="card-body">
                                <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                    <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                    <form action="{{ route('messages.destroy',$message) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-secondary font-18"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                </div>

                                <button type="button " class="btn btn-secondary m-r-10 m-b-10"><i class="mdi mdi-reload font-18"></i></button>

                            </div>
                            <div class="card-body p-t-0">
                                <div class="card b-all shadow-none">
                                    <div class="card-body">
                                        <h3 class="card-title m-b-0">{{ $message->subject }}</h3>
                                    </div>
                                    <div>
                                        <hr class="m-t-0">
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex m-b-40">
                                            <div>
                                                <a href="javascript:void(0)"><img src="{{ Str::contains($message->messageFrom->image, 'http') ? $message->messageFrom->image : '/storage/users/' . $message->messageFrom->image }}" alt="{{$message->messageFrom->name  }}" width="40" class="img-circle" /></a>
                                            </div>
                                            <div class="p-l-10">
                                                <h4 class="m-b-0">{{$message->messageFrom->name  }}</h4>
                                                <small class="text-muted">From: {{$message->messageFrom->email  }}</small>
                                            </div>
                                        </div>
                                        <p><b>Dear {{ $message->messageTo->name }}</b></p>
                                        @php
                                            echo $message->message ;
                                        @endphp
                                    </div>
                                    <div>
                                        <hr class="m-t-0">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
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
