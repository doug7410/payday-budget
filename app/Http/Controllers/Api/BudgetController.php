<?php

namespace App\Http\Controllers\Api;

use App\Budget;
use App\Http\Controllers\Controller;

class BudgetController extends Controller
{
    public function show($id)
    {
        return Budget::findOrFail($id);
    }
}
