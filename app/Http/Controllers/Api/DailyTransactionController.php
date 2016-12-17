<?php namespace app\Http\Controllers\Api;

use App\Budget;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailyTransactionController extends  Controller
{

    public function store(Request $request)
    {
        $budget = Budget::findOrFail($request->input('budget_id'));
        $budget->dailyTransactions()->create([
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'date' => Carbon::today()
        ]);

        return $budget;
    }
}