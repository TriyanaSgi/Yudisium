<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $technomy_yudisium = DB::table('batch')->get();
    
        return view('home', ['batch' => $technomy_yudisium]);
    }

    public function blank()
    {
        return view('layouts.blank-page');
    }
}
