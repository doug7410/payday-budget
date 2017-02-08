<?php namespace App\Http\Controllers;


use App\Date;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function iceland()
    {
        $date = Date::first();
        return view('iceland', [
            'date' => $date->trip_date
        ]);
    }

    public function icelandUpdate(Request $request)
    {
        $date =  $request->input('tripDate');
        $newDate = Date::first();
        $newDate->trip_date = $date;
        $newDate->save();
        return redirect('/iceland');
    }

    public function chile()
    {
        return view('chile');
    }

}