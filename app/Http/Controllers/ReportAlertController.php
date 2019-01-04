<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportAlert;
use Auth;

class ReportAlertController extends Controller
{
    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function create($id)
    {
        $report = Report::find($id);
        return view('report_alert.create', compact('report'));
    }

    public function store(Request $request, Report $report)
    {
        $this->validate(request(), [
            'reason' => 'required|string|max:500'
        ]);

        ReportAlert::create([
            'user_id' => Auth::user()->id,
            'report_id' => $report->id,
            'reason' => request('reason'),
            'create_at' => now()
        ]);

        session()->flash('message', 'Publicación reportada');

        return redirect('/');
    }
}
