<?php

namespace App\Http\Livewire;

use App\Expense;
use Livewire\Component;

class Expenses extends Component
{
    
   public $expenses = null , $occurance ,$type,$date,$amount,$description;

   
   public function updated($type)
   {
       $this->validateOnly($type,[
           'amount'=>"min:10"
       ]) ;
   }
   

    public function render()
    {
        return view('livewire.expenses');
    }

    public function deleteExpense( $expenseId = null)
    {
        $expense = Expense::findOrFail($expenseId) ;
        $expense->delete();
        session()->flash('success','Expense deleted  ');
        $this->expenses = $this->expenses->where('id','!=',$expenseId);
    }

    public function addExpense($propertyId)
    {
        dd($propertyId);
       
    }

    public function editExpense()
    {
        dd("edit") ;
    }
}
