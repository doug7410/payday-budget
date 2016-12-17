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

        return redirect()->action('BudgetController@show', ['id' => $budget->id]);
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
