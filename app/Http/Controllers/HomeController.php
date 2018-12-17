<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\CatReport;

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
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->first();
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();

        $news = Report::where('news', true)
                        ->where('active', true)
                        ->latest()
                        ->paginate(10);

        $security_reports_results = DB::table('reports')
                            ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                            ->select('reports.*')
                            ->where('sub_cat_report.cat_report_id', $cat_security->id)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->latest()
                            ->get();
                            // ->paginate(10);

        $security_reports = collect();

        foreach ($security_reports_results as $result) {
            $security_reports->push(new Report( (array) $result ));
        }

        $service_reports_results = DB::table('reports')
                            ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                            ->select('reports.*')
                            ->where('sub_cat_report.cat_report_id', $cat_service->id)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->latest()
                            ->get();
                            // ->paginate(10);

        $service_reports = collect();

        foreach ($service_reports_results as $result) {
            $service_reports->push(new Report( (array) $result));
        }

        return view('home', compact('news', 'security_reports', 'service_reports'));
    }
}
