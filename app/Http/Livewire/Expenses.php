<?php

namespace App\Http\Livewire;

use App\Expense;
use Livewire\Component;

class Expenses extends Component
{
   public $expenses = null;

    public function render()
    {
        return view('livewire.expenses');
    }

    public function deleteExpense( $expenseId = null)
    {
        $expense = Expense::findOrFail($expenseId) ;
        $expense->delete();
    }
}
