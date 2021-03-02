<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Property Expenses</h4>
                {{-- <h6 class="card-subtitle">Data table example</h6>
                --}}
                <div class="table-responsive m-t-40">
                    <div>
                        <form action="" method="post"></form>
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    </div>
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
                                        <a href="{{ route('expense.show',[$expense->id,$expense->property->id]) }}" class=" btn btn-info " > <i class="fa fa-eye" aria-hidden="true"></i> </a>


                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="{{ '#editExpense'.$expense->id }}">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{ 'editExpense'.$expense->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Expense</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form  action="{{ route('expense.update',[$expense->id,$expense->property->id]) }}" method="post">
                                                            @csrf
                                                            @method("put")
                                                            <input type="hidden" name="property_id" value="{{  session('property_id')  }}">
                                                            <div class="form-group">
                                                                <label for="occurance">Occurance</label>
                                                                <select id="occurance" class="form-control" name="occurance" required>
                                                                    <option value="{{ $expense->occurance }}" selected >{{ $expense->occurance }}</option>
                                                                    <option value="regular" >Regular</option>
                                                                    <option value="once">once</option>
                                                                </select>
                                                                @error('occurance')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="type">Type</label>
                                                                <select id="type" class="form-control" name="type" required >
                                                                    <option value="{{ $expense->type }}" selected >{{ $expense->type }}</option>
                                                                    <option value="rent" >rent</option>
                                                                    <option value="waterbill" >waterbill</option>
                                                                    <option value="electricitybill" >electricitybill</option>
                                                                    <option value="rent" >repair</option>
                                                                    <option value="others" >others</option>
                                                                </select>

                                                                @error('type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="date">Date</label>
                                                                <input id="date" required value="{{ $expense->date }}" class="form-control" type="date" name="date">
                                                                @error('date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="amount"  >Amount</label>
                                                                <input id="amount"value="{{ $expense->amount }}"  min="0" required class="form-control" type="text" name="amount">
                                                                @error('amount')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description</label>
                                                                <textarea id="description" class="form-control" name="description" rows="3">{{ $expense->description }}</textarea>
                                                                @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>
                                                            <button wire:submit.prevent="editExpense()" type="submit" class="btn btn-info btn-block">Update</button>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>






                                        @if (Auth::User()->isOwner())

                                        @endif
                                        <a href="#" id="{{ $expense->id  }}" onclick="deleteExpense({{ $expense->id }})" class=" btn btn-danger" wire:click.stop="deleteExpense({{ $expense->id }})" > <i class="fa fa-trash" aria-hidden="true"></i></i> </a>

                                    </td>

                                </tr>

                                {{  session()->put('property_id', $expense->property->id) }}



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

<!-- Modal -->
<div class="modal fade" id="addexpense" tabindex="-1" role="dialog" aria-labelledby="addexpense" aria-hidden="true">
    <div class="modal-dialog bg-cyan " role="document">
        <div class="modal-content" style="background-color: rgba(226, 226, 157, 0.067);" >
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent="addExpense({{ session('property_id') }})" method="post">
                    @csrf
                    <input type="hidden" name="property_id" value="{{  session('property_id')  }}">
                    <div class="form-group">
                        <label for="occurance">Occurance</label>
                        <select id="occurance" class="form-control" name="occurance" required>
                            <option value="" selected disabled>Select Occurance</option>
                            <option value="regular" >Regular</option>
                            <option value="once">once</option>
                        </select>
                        @error('occurance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select id="type" class="form-control" name="type" required >
                            <option value="" selected disabled>Select type</option>
                            <option value="rent" >rent</option>
                            <option value="waterbill" >waterbill</option>
                            <option value="electricitybill" >electricitybill</option>
                            <option value="rent" >repair</option>
                            <option value="others" >others</option>
                        </select>

                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input id="date" required class="form-control" type="date" name="date">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="amount"  >Amount</label>
                        <input id="amount" min="0" required class="form-control" type="text" name="amount">
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>

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
