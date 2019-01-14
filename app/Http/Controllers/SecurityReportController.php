<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSecurityReport;
use App\Report;
use App\Victim;
use App\Perpetrator;
use App\CommunityGroup;
use App\CatReport;
use App\SubCatReport;
use App\CatEvidence;
use App\CatTransportation;
use App\CatWeapon;
use App\State;
use App\SecurityReport;
use App\Evidence;
use App\Gender;
use Auth;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SecurityReportController extends Controller
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
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $categories = SubCatReport::where('cat_report_id', $cat_security[0]->id)
                                    ->where('active', true)
                                    ->get();

        $cat_evidence = CatEvidence::where('active', true)->get();
        $cat_transportation = CatTransportation::where('active', true)->get();
        $cat_weapon = CatWeapon::where('active', true)->get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        $activeCommunity = null;
        $communityGroups = [];

        $communities = [];
        $districts = [];
        $cantons = [];
        $provinces = [];

        return view('report.security.create', compact('categories', 'cat_evidence', 'cat_transportation', 'cat_weapon', 'date', 'time', 'communityGroups', 'communities', 'districts', 'cantons', 'provinces', 'activeCommunity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSecurityReport  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSecurityReport $request)
    {
        $request->validated();
        Auth::user()->addSecurityReport( $request );

        session()->flash('message', 'Reporte Creado');

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreSecurityReport  $request
     * @param  Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSecurityReport $request, Report $report)
    {
        $this->authorize('update', $report);

        $request->validated();
        $report->editSecurityReport( $request );

        session()->flash('message', 'Reporte Editado');


        return redirect('/');
    }
}
