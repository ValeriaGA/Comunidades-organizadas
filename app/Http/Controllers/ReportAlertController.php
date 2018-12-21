<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportAlertController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  Report $report
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $report = Report::find($id);
        return view('report_alert.create', compact('report'));
    }
}
