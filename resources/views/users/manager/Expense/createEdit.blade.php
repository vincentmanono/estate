@extends('layouts.admin')
@section('title')
    @if ($params == 'Edit Expense')

        <title>
            Edit Expense
        </title>
    @else

    <title>  Create Expense</title>
    @endif
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
                    <h4 class="text-themecolor">
                        @if ($params == 'Edit Expense')
                            Add new Expense


                        @else
                            Create Expense

                        @endif
                    </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">
                                @if ($params == 'Edit Expense')
                                    Add new Expense


                                @else
                                    create Expense

                                @endif
                                </h4>
                            </li>
                        </ol>
                        {{-- <button type="button"
                            class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                            New</button> --}}
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div style="float: right">

                                <a href="{{ route('manager.property.expenses',$property->id) }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: rgb(153, 164, 173);">
                            @if ($params == 'Edit Expense')

                                <form action="{{ route('manager.property.expenses.update', $expense->id) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="row">
                                        <div class="form-group col-lg-3 ">
                                            <label for="">Expence Occurance</label>
                                            <select class="form-control" name="occurance" id="occurance">
                                                <option value="{{ $expense->occurance }}" selected>{{ $expense->occurance }}
                                                </option>
                                                <option value="once">Once</option>
                                                <option value="regular">Regular</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3 ">
                                            <label for="">Expence type</label>
                                            <select class="form-control" name="type" id="occurance">
                                                <option selected value="{{ $expense->type }}">{{ $expense->type }}
                                                </option>
                                                <option value="Office">office</option>
                                                <option value="field">Field</option>
                                                <option value="wages">Wages</option>
                                                <option value="repair">Repair</option>
                                                <option value="miscellaneous">Miscellaneous</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" id="" value="{{ $expense->date }}"
                                                aria-autocomplete="both" class="form-control" placeholder="Date of expense">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="amount">Amount</label>
                                            <input type="number" name="amount" value="{{ $expense->amount }}" autofocus
                                                id="" class="form-control" placeholder="amount of expense">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" autofocus
                                            rows="3">{{ $expense->description }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>

                                </form>

                            @elseif($params =='Create Expense')

                            <form action="{{ route('manager.property.expenses.store', $property->id) }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-3 ">
                                        <label for="">Expence Occurance</label>
                                        <select class="form-control" name="occurance" id="occurance">
                                            <option disabled selected>Select Occurance</option>
                                            <option value="once">Once</option>
                                            <option value="regular">Regular</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3 ">
                                        <label for="">Expence type</label>
                                        <select class="form-control" name="type" id="type">
                                            <option selected disabled>Select type</option>
                                            <option value="Office">office</option>
                                            <option value="field">Field</option>
                                            <option value="wages">Wages</option>
                                            <option value="repair">Repair</option>
                                            <option value="miscellaneous">Miscellaneous</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id=""
                                            aria-autocomplete="both" class="form-control" placeholder="Date of expense">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount"  autofocus
                                            id="" class="form-control" placeholder="amount of expense">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" autofocus
                                        rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Create new Expense</button>

                            </form>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->

            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection
