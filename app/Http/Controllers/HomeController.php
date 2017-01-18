<?php namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function iceland()
    {
        return view('iceland');
    }

    public function chile()
    {
        return view('chile');
    }

}