<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{

    /**
     *
     */
    public function index()
    {
        return view('budget.index')->with([
            'budgets' => Budget::all()
        ]);
    }
    public function create()
    {
        return view('budget.create');
    }

    public function store(Request $request)
    {
        Budget::create($request->input());
        dd(Budget::all());
    }

    public function show($id)
    {
        $budget = Budget::findOrFail($id);

        return view('budget.show')->with(compact('budget'));
    }
}
