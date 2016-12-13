<?php namespace app\Http\Controllers\Api;


use App\Budget;
use Illuminate\Http\Request;

class DailyTransactionController
{

    public function store(Request $request)
    {
        $budget = Budget::findOrFail($request->input('budget_id'));
        $budgetDay = $budget->currentBudgetDay();
        $budgetDay->spent_amount += $request->input('amount');
        $budgetDay->dailyTransactions()->create([
            'description' => $request->input('description'),
            'amount' => $request->input('amount')
        ]);
        $budgetDay->save();

        return Budget::with(['budgetDays', 'dailyTransactions'])->where('id', $budget->id)->first();
    }
}