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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function blank()
    {
        return view('layouts.blank-page');
    }

    public function data_mhs()
    {
        return view('layouts.datamhs.data_mhs');
    }

    public function data_mhs_cr()
    {
        return view('layouts.datamhs.data_mhs_cr');
    }

    public function data_prodi()
    {
        return view('layouts.datamhs.data_prodi');
    }

    public function prodi_cr()
    {
        return view('layouts.datamhs.prodi_cr');
    }




    public function data_pt()
    {
        return view('layouts.datamhs.data_pt');
    }

    public function pt_cr()
    {
        return view('layouts.datamhs.pt_cr');
    }
    public function data_batch_yudisium()
    {
        return view('layouts.batchyudisium.data_batch_yudisium');
    }

    public function batch_cr()
    {
        return view('layouts.batchyudisium.batch_cr');
    }
}
