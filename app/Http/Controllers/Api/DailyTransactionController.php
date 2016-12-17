<?php namespace app\Http\Controllers\Api;


use App\Budget;
use App\DailyTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyTransactionController
{

    public function store(Request $request)
    {
        $budget = Budget::findOrFail($request->input('budget_id'));
        $budget->dailyTransactions()->create([
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'date' => Carbon::today()
        ]);
        $budgetDay->save();

        return Budget::with(['budgetDays', 'dailyTransactions'])->where('id', $budget->id)->first();
    }
}