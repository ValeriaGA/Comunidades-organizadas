<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\ReportAlert;

class AdministrationReportController extends Controller
{

    public function __construct()
    {
        
        // only administrators are allowed to view this
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = DB::table('report_alert')
                    ->join('reports', 'report_alert.report_id', '=', 'reports.id')
                    ->join('users', 'reports.user_id', '=', 'users.id')
                    ->select('report_alert.report_id', 'reports.user_id', 'reports.title', 'users.email', DB::raw('count(report_alert.report_id) as count'))
                    ->groupBy('report_alert.report_id')
                    ->get();
        return view('administration.report.index', compact('reports'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $report_alerts = DB::table('report_alert')
                            ->join('users', 'report_alert.user_id', '=', 'users.id')
                            ->select('users.email', 'report_alert.reason', 'report_alert.created_at', 'report_alert.id')
                            ->where('report_alert.report_id', $report->id)
                            ->get();
        return view('administration.report.show', compact('report', 'report_alerts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ReportAlert $reportAlert
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportAlert $reportAlert)
    {
        ReportAlert::destroy($reportAlert->id);

        session()->flash('message', 'Reporte de publicacion removida');

        return back();
    }

}
