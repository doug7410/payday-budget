<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function show($id)
    {
        Budget::create(['name' => 'hello']);
        return Budget::find($id);
    }
}
