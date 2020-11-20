
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
                <h4 class="text-themecolor">Compose</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Compose</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        @include('messages.messagesidebar')

                        <div class="col-xlg-10 col-lg-9 col-md-8 bg-light border-left">
                            <div class="card-body">

                                <h3 class="card-title">Compose New Message</h3>
                                <form action="{{ route('messages.store') }}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                      <select id="js-users-multiple" multiple class="form-control js-example-basic-single" name="to[]" id="To">

                                          @foreach ($users as $user)
                                          <option value="{{ $user->id }}" >{{ $user->name }}</option>
                                          @endforeach


                                      </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="subject" placeholder="Subject:">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="textarea_editor form-control" rows="15" placeholder="Write message here ..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> Send</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
@endsection

@section('extraScripts')
<script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();
        $('#js-users-multiple').select2();

    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    </script>
@stop

