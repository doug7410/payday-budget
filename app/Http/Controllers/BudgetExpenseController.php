<?php namespace App\Http\Controllers;


use App\Budget;

class BudgetExpenseController
{


    public function create($budgetId)
    {
        return view('budgetExpense.create')->with(compact('budgetId'));
    }
}