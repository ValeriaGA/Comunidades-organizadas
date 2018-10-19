<?php

namespace App\Http\Controllers;

use App\Incident;
use App\TypeOfIncident;
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

        // apply this middleware oto everything except index
        // $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        $incidents = Incident::latest()->get();
        return view('home', compact('types', 'incidents'));
    }
}