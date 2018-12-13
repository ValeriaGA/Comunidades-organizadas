<?php

namespace App\Http\Controllers;

use App\Report;
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
        // $this->middleware('auth');

        // apply this middleware only to index
        // $this->middleware('auth', ['only' => 'index']);

        // apply this middleware to everything except index
        // $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('home', compact('types', 'reports'));
    }
}
