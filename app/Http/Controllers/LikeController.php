<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Like;
use Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function store(Request $request)
    {
        $report = Report::findOrFail($request['report_id']);

        if (!$report) return null;

        $report->like()->attach(Auth::user()->id);

        return \Response::json(); 
    }

    public function destroy(Request $request)
    {
    	$report = Report::findOrFail($request['report_id']);

        if (!$report) return null;

        $report->like()->detach(Auth::user()->id);

        return \Response::json(); 
    }
}
