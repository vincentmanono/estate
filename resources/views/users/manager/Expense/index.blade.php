@extends('layouts.admin')

@section('title')
    <title>{{ $property->name . "Expenses" }} </title>
@stop

@section('content')

<!-- ============================================================== -->
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
                <h4 class="text-themecolor h3">{{ $property->name . "( ". $property->branch->name . " )"  }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Property expenses</li>
                    </ol>
                    <a href="{{ route('manager.property.expenses.create',$property->id) }}" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">All Expenses for {{ $property->name }}</h4>
                                                        {{-- <h6 class="card-subtitle">Data table example</h6> --}}
                                                        <a href="{{ route('home') }}"class="btn btn-primary" style="float: right;" >  Back</a>
                                                        <div class="table-responsive m-t-40">
                                                            <table id="myTable" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Occurance</th>
                                                                        <th>Type</th>
                                                                        <th>Date</th>
                                                                        <th>Amount</th>
                                                                        <th>Description</th>
                                                                        <th>status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($expenses as $expense)

                                                                    <tr class="text text-capitalize" >
                                                                    <td>{{$expense->occurance}}</td>
                                                                    <td>{{$expense->type}}</td>
                                                                    <td>{{$expense->date}}</td>
                                                                    <td> Ksh {{ number_format( $expense->amount,2) }}</td>

                                                                    <td class="btn btn-primary" title="Click to read description" data-container="body" title="Expense Description" data-toggle="popover" data-placement="top" data-content="{{ $expense->description }}"  > {{ Str::of($expense->description)->limit(30,'...') }} </td>
                                                                    <td>

                                                                        @if ( $expense->solved)
                                                                            <span class="badge badge-success"> Solved </span>
                                                                        @else
                                                                        <span class="badge badge-warning">Pending</span>

                                                                        @endif

                                                                    </td>

                                                                    <td class="row">
                                                                        @if ( $expense->solved)
                                                                        <a class="btn btn-dark mr-2 expensesApprove " href="#" data-toggle="tooltip" title="Expense Already Approved"> <i class="fa fa-play-circle" aria-hidden="true">Disapprove </i> </a>
                                                                        @else
                                                                        <a class="btn btn-info mr-2 expensesApprove "  href="#" data-toggle="tooltip" title="Approve Expense"> <i class="fa fa-play-circle" aria-hidden="true">Approve </i> </a>

                                                                        @endif

                                                                        <a  class="btn btn-success " href="{{ route('manager.property.expenses.edit',$expense->id) }}" data-toggle="tooltip" title="Edit expense"> <i class="ti-marker-alt"></i></a>
                                                                        <a  class="btn btn-danger expenseDelete " href="#" data-toggle="tooltip" title="Delete expense"> <i class="fa fa-trash" aria-hidden="true"></i></a>

                                                                        <form id="expenseDelete" action="{{ route('manager.property.expenses.delete',$expense->id) }}" method="post">
                                                                            @method("DELETE")
                                                                            @csrf
                                                                        </form>


                                                                        <form id="expensesApprove" action="{{ route('manager.property.expenses.approve',$expense->id) }}" method="post">
                                                                            @csrf
                                                                            @if ($expense->solved)
                                                                            <input type="hidden" name="solved" value="0">
                                                                            @else
                                                                            <input type="hidden" name="solved" value="1">
                                                                            @endif

                                                                        </form>


                                                                    </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Occurance</th>
                                                                            <th>Type</th>
                                                                            <th>Date</th>
                                                                            <th>Amount</th>
                                                                            <th>Description</th>
                                                                            <th>status</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                </tbody>
                                                            </table>
                                                            <ul class="list-group list-group-horizontal">
                                                                <li class="list-group-item active text text-center text-bold ">Expenses Statistics</li>
                                                                <li class="list-group-item  "> Padding Expenses Cost <span class="text text-bold float-right mr-3" >{{ "Ksh" . number_format(  $expensesPeddingSum ,2)    }}</span>  </li>
                                                                <li class="list-group-item  "> Selved Expenses Cost <span class="text text-bold float-right mr-3" > {{ "Ksh" . number_format(  $expensesSolvedSum,2)    }}</span>  </li>
                                                            </ul>
                                                        </div>

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
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
@endsection

@section('extraScripts')
    <script>

        $(".expensesApprove").click((event)=>{
            event.preventDefault()
            if( confirm('Are you sure you need to take this Action ?') ){
                $('#expensesApprove').submit()
            }
        })
        $(".expenseDelete").click((event)=>{
            event.preventDefault()
            if( confirm('Are you sure you need to delete this expense ?') ){
                $('#expenseDelete').submit()
            }
        })

    </script>
@stop

