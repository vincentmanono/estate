
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
                <h4 class="text-themecolor">Mailbox</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Mailbox</li>
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
                        <div class="col-lg-9 col-md-8 bg-light border-left">
                            <div class="card-body">
                                <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                    <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                    <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-delete"></i></button>
                                </div>

                                <button type="button " class="btn btn-secondary m-r-10 m-b-10"><i class="mdi mdi-reload font-18"></i></button>

                            </div>
                            <div class="card-body p-t-0">
                                <div class="card b-all shadow-none">
                                    <div class="inbox-center table-responsive">
                                        <table class="table table-hover no-wrap">
                                            <tbody>

                                                @foreach ($messages as $message)



                                                <tr class="unread">
                                                    <td style="width:40px">
                                                        <div class="custom-control custom-checkbox mr-sm-2">
                                                            <input type="checkbox" class="custom-control-input" id="checkbox0" value="check">
                                                            <label class="custom-control-label" for="checkbox0"></label>
                                                        </div>
                                                    </td>
                                                    <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                    <td class="hidden-xs-down">{{ $message->messageFrom->name }}</td>
                                                    <td class="max-texts"> <a class="text text-info"  href="{{ route('messages.show',$message->id) }}" />{{ Str::of($message->message)->limit(30) }}</td>
                                                    <td class="text-right"> {{ ($message->created_at)->format('d/M/Y') }} </td>
                                                </tr>

                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
