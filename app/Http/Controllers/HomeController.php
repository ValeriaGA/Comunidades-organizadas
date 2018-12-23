<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\CatReport;
use App\SubCatReport;
use App\Like;
use App\CommunityGroup;

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
        $sub_cat_service = SubCatReport::where('cat_report_id', $cat_service->id)->get();
        $sub_cat_service_ids = array();
        foreach($sub_cat_service as $cat)
        {
            array_push($sub_cat_service_ids, $cat->id);
        }

        $service_reports = Report::whereIn('sub_cat_report_id', $sub_cat_service_ids)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->latest()
                            ->paginate(10);

        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();
        $sub_cat_security = SubCatReport::where('cat_report_id', $cat_security->id)->get();
        $sub_cat_security_ids = array();
        foreach($sub_cat_security as $cat)
        {
            array_push($sub_cat_security_ids, $cat->id);
        }

        $security_reports = Report::whereIn('sub_cat_report_id', $sub_cat_security_ids)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->latest()
                            ->paginate(10);

        $news = Report::where('news', true)
                        ->where('active', true)
                        ->latest()
                        ->paginate(10);
                        
        return view('home', compact('news', 'security_reports', 'service_reports'));
    }
}
