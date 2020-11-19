@extends('layouts.admin')
@section('title')
<title>Chief Properties - Payments</title>
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
                    <h4 class="text-themecolor">All paymentes</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Payment details</li>
                        </ol>
                        <a href="{{ route('payment.create') }}" type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Payments Table</h4>
                                            {{-- <h6 class="card-subtitle">Data table example
                                            </h6> --}}
                                            <div style="float: right">
                                                <a class="btn btn-sm btn-primary" href="{{ route('home') }}">Back</a>
                                            </div>
                                            <div class="table-responsive m-t-40">
                                                <table id="myTable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <td>ID</td>
                                                            <th>NAME</th>
                                                            <th>NUMBER</th>
                                                            <th>ACTIONS</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($payments as  $payment)

                                                            <tr>
                                                                <td>{{ $payment->id }}</td>
                                                                <td>{{ $payment->type }}</td>
                                                                <td>{{ $payment->number }}</td>
                                                                <td class="row">
                                                                    <a href="{{ route('payment.create') }}" class="btn btn-sm btn-info" style="margin-right: 2%;">Create</a>
                                                                    <a href="{{ route('payment.edit',$payment->id) }}" class="btn btn-sm btn-success" style="margin-right: 2%;" >Edit</a>
                                                                    <form action="{{ route('payment.destroy',$payment->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button onclick="return confirm('Are you sure you want to delete this record?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                                    </form>
                                                                </td>


                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>
                                                        <th>ID</th>
                                                        <th>NAME</th>
                                                        <th>NUMBER</th>
                                                        <th>ACTIONS</th>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
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
            <!-- Right sidebar -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>

@endsection
