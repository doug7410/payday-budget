<?php

namespace App\Http\Controllers\Api;

use App\Budget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function show($id)
    {
        return Budget::with(['budgetDays', 'dailyTransactions'])->where('id', $id)->first();
    }
}
