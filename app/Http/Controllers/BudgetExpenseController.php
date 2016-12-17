<?php namespace App\Http\Controllers;


class BudgetExpenseController extends Controller
{

    public function create($budgetId)
    {
        return view('budgetExpense.create')->with(compact('budgetId'));
    }
}