<?php namespace App\Http\Controllers\Api;



use App\Budget;
use App\BudgetExpense;
use Illuminate\Http\Request;

class BudgetExpenseController
{
    public function index($budgetId)
    {
        return Budget::findOrFail($budgetId)->expenses;
    }

    public function store(Request $request)
    {
        $budget = Budget::findOrFail($request->input('budget_id'));

        $budget->expenses()->create($request->input());


        $dailyAmount = $budget->remainingAfterExpenses / $budget->budgetDays->count();
        foreach($budget->budgetDays as $day)
        {
            $day->start_amount = $dailyAmount;
            $day->save();
        }


        return $budget->expenses;
    }
}