<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Property Expenses</h4>
                {{-- <h6 class="card-subtitle">Data table example</h6>
                --}}
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>occurance</th>
                                <th>type</th>
                                <th>Type</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->occurance }}</td>
                                    <td>{{ $expense->type }}</td>
                                    <td>{{ $expense->date }}</td>
                                    <td>{{ number_format($expense->amount) }}</td>
                                    <td>
                                        <a href="http://"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                        <a href=""> <i class="fa fa-pencil-square" aria-hidden="true"></i> </a>
                                        <a href="#" wire:click="deleteExpense({{ $expense->id }})" > <i class="fa fa-trash" aria-hidden="true"></i></i> </a>



                                    </td>

                                </tr>


                            @endforeach
                            <thead>
                                <tr>
                                    <th>occurance</th>
                                    <th>type</th>
                                    <th>Type</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
