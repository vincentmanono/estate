<?php

namespace App\Http\Controllers;

use App\User;
use App\Expense;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $user = User::find(Auth::user()->id);

        $expenses = Expense::where('property_id',$property->id)->latest()->get();
        return view('properties.expenses.index',compact('expenses','property')) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {
        // return view()
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = Expense::create($request->all());
        return back()->with('success','Expense Added') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show($propertyId , $expenseId)
    {
        $expense = Expense::findOrFail($expenseId) ;
        
        return view('properties.expenses.show',compact('expense') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $expenseId,$propertyId)
    {
        // return $expenseId ;
        $expense = Expense::findOrFail($expenseId) ;
        $expense->update($request->all());
        return redirect()->route('expense.show',[$expense->id,$expense->property->id]) ->with('success',"expense updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
