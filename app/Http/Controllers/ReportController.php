<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\CatEvidence;
use App\CatReport;
use App\SubCatReport;
use App\CatTransportation;
use App\CatWeapon;
use App\Evidence;
use App\Perpetrator;
use App\Victim;
use App\Province;
use App\Canton;
use App\District;
use Auth;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
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
        return view('report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_evidence = CatEvidence::get();
        $cat_report = CatReport::get();
        $sub_cat_report = SubCatReport::get();
        $cat_transportation = SubCatReport::get();
        $cat_weapon = SubCatReport::get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        return view('report.create', compact('types', 'weapons', 'transportation', 'date', 'time'));
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
            'location' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'time' => 'required',
            'description' => 'required',
            'longitud' => 'required|numeric|between:-90,90',
            'latitud' => 'required|numeric|between:-180,180',
            'perpetrators' => 'required|integer|min:1',
            'victims' => 'required|integer|min:0',
            'type' => 'required',
            'weapon' => 'required',
            'transportation' => 'required',
            'sex' => 'required',
            'file' => 'max:10240'
        ]);

        $type = TypeOfIncident::where('name', 'LIKE', request('type'))->get();
        $weapon = Weapon::where('name', 'LIKE', request('weapon'))->get();
        $transportation = Transportation::where('name', 'LIKE', request('transportation'))->get();

        $filename = '';
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/evidence', $filename);
        }

        $report = Incident::create([
            'location' => request('location'),
            'description' => request('description'),
            'longitud' => request('longitud'),
            'latitud' => request('latitud'),
            'date' => request('date'),
            'time' => request('time'),
            'perpetrators' => request('perpetrators'),
            'victims' => request('victims'),
            'primary_victim_sex' => (request('victims') == 0 ? NULL : (request('sex') == 'Masculino' ? 'm' : (request('sex') == 'Femenino' ? 'f' : 'o'))),
            'type_id' => $type[0]['id'],
            'weapon_id' => $weapon[0]['id'],
            'transportation_id' => $transportation[0]['id'],
            'user_id' => Auth::user()->id
        ]);

        $evidence = Evidence::create([
            'incident_id' => $report->id,
            'multimedia_path' => $filename
        ]);

        session()->flash('message', 'Incident added');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $report)
    {
        return view('report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
