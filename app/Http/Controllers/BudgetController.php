<?php

namespace App\Http\Controllers;

use App\Budget;
use app\BudgetDay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BudgetController extends Controller
{

    /**
     * @return View
     */
    public function index()
    {
        return view('budget.index')->with([
            'budgets' => Budget::all()
        ]);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('budget.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        return view('budget.show')->with(compact('id'));
    }
}
