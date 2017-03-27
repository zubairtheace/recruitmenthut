<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function vacancies()
    {
        return view('pages/vacancies');
    }

    public function candidates()
    {
        return view('pages/candidates');
    }

    public function applications()
    {
        return view('pages/applications');
    }

    public function interviews()
    {
        return view('pages/interviews');
    }

    public function recruiters()
    {
        return view('pages/recruiters');
    }

    public function positions()
    {
        return view('pages/positions');
    }

    public function interviewTypes()
    {
        return view('pages/interview-types');
    }
}
