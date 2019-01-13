<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceReport;
use App\CommunityGroup;
use App\Report;
use App\CatReport;
use App\SubCatReport;
use App\CatEvidence;
use App\State;
use App\News;
use App\Evidence;
use App\Gender;

use Auth;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ServiceReportController extends Controller
{

    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $community_groups = CommunityGroup::all();

        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->get();
        $categories = SubCatReport::where('cat_report_id', $cat_service[0]->id)
                                    ->where('active', true)
                                    ->get();

        $cat_evidence = CatEvidence::where('active', true)->get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        $activeCommunity = null;
        $communityGroups = [];

        $communities = [];
        $districts = [];
        $cantons = [];
        $provinces = [];

        return view('report.service.create', compact('categories', 'cat_evidence', 'date', 'time', 'communityGroups', 'communities', 'districts', 'cantons', 'provinces', 'activeCommunity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreServiceReport  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceReport $request)
    {
        $request->validated();
        Auth::user()->addServiceReport( $request );

        session()->flash('message', 'Reporte Creado');

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreServiceReport  $request
     * @param  Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(StoreServiceReport $request, Report $report)
    {
        $this->authorize('update', $report);
        $request->validated();
        $report->editServiceReport( $request );

        session()->flash('message', 'Reporte Editado');
        return redirect('/');
    }
}
