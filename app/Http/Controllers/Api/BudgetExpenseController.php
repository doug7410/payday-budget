<?php namespace App\Http\Controllers\Api;

use App\Budget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BudgetExpenseController extends  Controller
{
    public function index($budgetId)
    {
        return Budget::findOrFail($budgetId)->expenses;
    }

    public function store(Request $request)
    {
        $budget = Budget::findOrFail($request->input('budget_id'));

        $budget->expenses()->create($request->input());

        return $budget->expenses;
    }
}