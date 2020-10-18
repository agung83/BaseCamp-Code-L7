<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\beritaModels;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = beritaModels::paginate(6);
        // $data = beritaModels::all();
        return view('home', compact('data'));
    }
}
