<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Victim;
use App\CommunityGroup;
use App\CatReport;
use App\SubCatReport;
use App\CatEvidence;
use App\CatTransportation;
use App\CatWeapon;
use App\State;
use App\SecurityReport;
use App\Evidence;
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
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.security.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $community_groups = CommunityGroup::all();

        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $categories_security = SubCatReport::where('cat_report_id', $cat_security[0]->id)->get();

        $cat_evidence = CatEvidence::get();
        $cat_transportation = CatTransportation::get();
        $cat_weapon = CatWeapon::get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        return view('report.security.create', compact('categories_security', 'cat_evidence', 'cat_transportation', 'cat_weapon', 'date', 'time', 'community_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|string|max:255',
            'community_group' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'time' => 'required',
            'description' => 'required',
            'longitud' => 'required|numeric|between:-90,90',
            'latitud' => 'required|numeric|between:-180,180',
            'type' => 'required',
            'weapon' => 'required',
            'transportation' => 'required'
        ]);
        // dd($request->all());

        $categories_security = SubCatReport::where('name', 'LIKE', request('type'))->first();
        $weapon = CatWeapon::where('name', 'LIKE', request('weapon'))->first();
        $transportation = CatTransportation::where('name', 'LIKE', request('transportation'))->first();

        $state = State::where('name', 'LIKE', 'Sin Procesar')->first();

        // $filename = '';
        // if ($request->hasFile('file'))
        // {
        //     $file = $request->file('file');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('images/evidence', $filename);
        // }

        $report = Report::create([
            'community_group_id' => request('community_group'),
            'title' => request('title'),
            'description' => request('description'),
            'longitud' => request('longitud'),
            'latitud' => request('latitud'),
            'date' => request('date'),
            'time' => request('time'),
            'state_id' => $state->id,
            'sub_cat_report_id' => $categories_security->id,
            'user_id' => Auth::user()->id,
            'active' => true,
            'news' => false
        ]);

        $security_report = SecurityReport::create([
            'report_id' => $report->id,
            'cat_weapon_id' => $weapon->id,
            'cat_transportation_id' => $transportation->id
        ]);

        // $evidence = Evidence::create([
        //     'incident_id' => $report->id,
        //     'multimedia_path' => $filename
        // ]);

        session()->flash('message', 'Reporte Creado');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  Report $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
  
        return view('report.security.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $security_report = SecurityReport::find($id);
        $report = $security_report->report;

        $community_groups = CommunityGroup::all();

        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $categories_security = SubCatReport::where('cat_report_id', $cat_security[0]->id)->get();

        $cat_evidence = CatEvidence::get();
        $cat_transportation = CatTransportation::get();
        $cat_weapon = CatWeapon::get();

        $states = State::get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        return view('report.security.edit', compact('report', 'categories_security', 'cat_evidence', 'cat_transportation', 'cat_weapon', 'date', 'time', 'community_groups', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required|string|max:255',
            'community_group' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'time' => 'required',
            'description' => 'required',
            'longitud' => 'required|numeric|between:-90,90',
            'latitud' => 'required|numeric|between:-180,180',
            'type' => 'required',
            'weapon' => 'required',
            'transportation' => 'required'
        ]);
        // dd($request->all());

        try{
            $categories_security = SubCatReport::where('name', 'LIKE', request('type'))->first();
            $weapon = CatWeapon::where('name', 'LIKE', request('weapon'))->first();
            $transportation = CatTransportation::where('name', 'LIKE', request('transportation'))->first();

            $state = State::where('name', 'LIKE', 'Sin Procesar')->first();

            // $filename = '';
            // if ($request->hasFile('file'))
            // {
            //     $file = $request->file('file');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time().'.'.$extension;
            //     $file->move('images/evidence', $filename);
            // }


            $report = Report::findOrFail($id);

            $report->community_group_id = request('community_group');
            $report->title = request('title');
            $report->description = request('description');
            $report->longitud = request('longitud');
            $report->latitud = request('latitud');
            $report->date = request('date');
            $report->time = request('time');
            $report->state_id = $state->id;
            $report->sub_cat_report_id = $categories_security->id;
            $report->active = request('active');
            $report->save();

            $security_report = SecurityReport::where('report_id', $report->id)->first();
            $security_report->cat_transportation_id = $transportation->id;
            $security_report->cat_weapon_id = $weapon->id;
            $security_report->save();

            // $evidence = Evidence::create([
            //     'incident_id' => $report->id,
            //     'multimedia_path' => $filename
            // ]);

            session()->flash('message', 'Reporte Creado');

            return redirect('/');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }
}
