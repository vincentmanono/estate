<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Property;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function property($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        $sumExpenses = Expense::where('property_id',$propertyId)->where('solved',false) ->pluck('amount')->sum();

        return view('users.manager.property',compact('property','sumExpenses')) ;

    }
    public function expenses($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        $expenses = Expense::where('property_id',$propertyId)->latest()->get();
        $expensesSolvedSum = Expense::where('property_id',$propertyId)->where('solved',true) ->pluck('amount')->sum();
        $expensesPeddingSum = Expense::where('property_id',$propertyId)->where('solved',false) ->pluck('amount')->sum();
        return view('users.manager/Expense/index',compact('expenses','property','expensesSolvedSum','expensesPeddingSum')) ;

    }
}
