@extends('layouts.admin')
@section('title')
    <title>Expense</title>
@endsection
@section('content')
<div class="page-wrapper text text-capitalize">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ "Expense for ". $expense->property->name }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Expense</li>
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">

                                    <div class="col-md-12 ">
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark">
                                                <h4 class="m-b-0 text-white "> <span>Property Expense</span>  <a class="btn btn-info float-right pr-4" href="{{ route('expense.index',$expense->property->id) }}"> Back </a> </h4> </div>
                                            <div class="card-body text text-capitalize">
                                                <div class="card-title"><span>occurance</span> <span class=" text text-active float-right text-dark  " >{{ $expense->occurance }}</span> </div>
                                                <div class="card-title"><span>type</span> <span class=" text text-active float-right text-dark " >{{ $expense->type }}</span> </div>
                                                <div class="card-title"><span>date</span> <span class="text text-active float-right text-dark " >{{ $expense->date }}</span> </div>
                                                <div class="card-title"><span>amount</span> <span class=" text text-active float-right text-dark " >{{ $expense->amount }}</span> </div>
                                                <div class="card-title"><span>description</span> <span class=" text text-active float-right text-dark " >{{ $expense->description }}</span> </div>


                                            </div>
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
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>

@endsection
@section('extraScripts')
    <script>
        //  confirm('Are you sure you need to delete this expense') 
        function deleteExpense(expenseId) {
            // event.preventDefault()
            
            if (confirm('Are you sure you need to delete this expense') ) {
                return true ;
            }
            event.stopImmediatePropagation()
            return false ;
           
        }
    </script>
@endsection
