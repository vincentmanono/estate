<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Unit;
use App\Expense;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    public function property($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        $now =Carbon::now()->format('Y-m-d H:i:s');
        $prev = Carbon::now()->subMonth(1)->format('Y-m-d H:i:s');
        $CurrentActiveRents = Rent::where("property_id",$propertyId)->where('expiry_date ','>',$prev)->get();
        $CurrentActiveRentsSum = Rent::where("property_id",$propertyId)->where('expiry_date ','>',$prev)->pluck('amount')->sum();
        $sumExpenses = Expense::where('property_id',$propertyId)->where('solved',false) ->pluck('amount')->sum();


        return view('users.manager.property',compact('property','sumExpenses','CurrentActiveRents','CurrentActiveRentsSum')) ;

    }
    public function expenses($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        $expenses = Expense::where('property_id',$propertyId)->latest()->get();
        $expensesSolvedSum = Expense::where('property_id',$propertyId)->where('solved',true) ->pluck('amount')->sum();
        $expensesPeddingSum = Expense::where('property_id',$propertyId)->where('solved',false) ->pluck('amount')->sum();
        return view('users.manager/Expense/index',compact('expenses','property','expensesSolvedSum','expensesPeddingSum')) ;
    }
    public function expensesApprove(Request $request ,$expensesId)
    {
        $expense = Expense::findOrFail($expensesId);
        $expense->solved = $request->solved ;
        $expense->save();
     ($request->solved ) ? $request->session()->flash('success', "Expense Approved") : $request->session()->flash('success', "Expense Disapproved") ;

        return back();

    }

    public function expensesCreate($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        return view('users.manager/Expense/createEdit',compact('property'))->with('params','Create Expense') ;

    }
    public function expensesStore(Request $request ,$propertyId)
    {
        $property = Property::findOrFail($propertyId);
        $expense =  $property->expenses()->create($request->all()) ;
        ($expense ) ? $request->session()->flash('success', "Expense Created") : $request->session()->flash('success', "Error occurred!!") ;

        return redirect()->route('manager.property.expenses',$property->id);


    }

    public function expensesEdit($expensesId)
    {
        $expense = Expense::findOrFail($expensesId);
        return view('users.manager/Expense/createEdit',compact('expense'))->with('params','Edit Expense') ;

    }
    public function expensesUpdate(Request $request , $expensesId)
    {
        $expense = Expense::findOrFail($expensesId);
        $expense->update([
            'occurance'=>$request->occurance,
            'type'=>$request->type,
            'date'=>$request->date ,
            'amount'=>$request->amount
        ]) ;
        $request->session()->flash('success', "Expence updated");
        return redirect()->route('manager.property.expenses',$expense->property->id);

    }
    public function expensesDelete($expensesId)
    {
        $expense = Expense::findOrFail($expensesId);
        $expense->delete();
        Session::flash('success', "Expence deleted");
        return redirect()->route('manager.property.expenses',$expense->property->id);


    }
}
