<?php

namespace App\Http\Controllers;

use App\Budget;
use app\BudgetDay;
use Carbon\Carbon;
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
        $budget = Budget::create($request->input());
        $startDate = Carbon::createFromFormat('Y-m-d',$request->input('start_date'))->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d',$request->input('end_date'))->endOfDay();
        $days = $startDate->diffInDays($endDate)+1;
        $dailyAmount = $request->input('start_amount') / $days;

        foreach(range(0, $days-1) as $day)
        {
            $budget->budgetDays()->create([
                'date' => Carbon::createFromFormat('Y-m-d',$request->input('start_date'))->addDays($day)->startOfDay(),
                'start_amount' => $dailyAmount
            ]);
        }

        return redirect()->action('BudgetController@index');
    }

    public function show($id)
    {
        $budget = Budget::findOrFail($id);

        return view('budget.show')->with(compact('budget'));
    }
}
