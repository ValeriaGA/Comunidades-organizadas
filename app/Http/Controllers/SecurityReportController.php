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
     * @param  StoreSecurityReport  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSecurityReport $request)
    {
        $validated = $request->validated();

        $categories_security = SubCatReport::where('name', 'LIKE', request('type'))->first();
        $weapon = CatWeapon::where('name', 'LIKE', request('weapon'))->first();
        $transportation = CatTransportation::where('name', 'LIKE', request('transportation'))->first();

        $state = State::where('name', 'LIKE', 'Sin Procesar')->first();

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

        if ($request->has('victim_gender'))
        {
            $victims = request('victim_gender');
            foreach($victims as $victim)
            {
                Victim::create([
                    'security_report_id' => $security_report->id,
                    'gender_id' => $victim
                ]);
            }
        }

        if ($request->has('perpetrator_gender')
            && $request->has('perpetrator_description'))
        {
            $perpetrator_genders = request('perpetrator_gender');
            $perpetrator_descriptions = request('perpetrator_description');
            if (count($perpetrator_genders) == count($perpetrator_descriptions))
            {
                for($i = 0; $i < count($perpetrator_descriptions); ++$i)
                {
                    $perp = Perpetrator::create([
                        'description' => $perpetrator_descriptions[$i],
                        'security_report_id' => $security_report->id,
                        'gender_id' => $perpetrator_genders[$i]
                    ]);
                }
            }
            
        }

        if ($request->has('evidence_file'))
        {
            $evidence = request('evidence_file');
            $i = 0;
            foreach($evidence as $e)
            {
                $filename = '';
                $extension = $e->getClientOriginalExtension();
                $filename = time().'_'.$i++.'.'.$extension;
                $e->move('evidence/'.$report->id, $filename);

                $cat_evidence = CatEvidence::get_cat_evidence($extension);
                if ($cat_evidence != null)
                {
                    Evidence::create([
                        'report_id' => $report->id,
                        'multimedia_path' => $filename,
                        'cat_evidence_id' => $cat_evidence->id
                    ]);
                }else
                {
                    // Not supported type
                }
            }
        }

        session()->flash('message', 'Reporte Creado');

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreSecurityReport  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSecurityReport $request, $id)
    {
        $validated = $request->validated();

        $categories_security = SubCatReport::where('name', 'LIKE', request('type'))->first();
        $weapon = CatWeapon::where('name', 'LIKE', request('weapon'))->first();
        $transportation = CatTransportation::where('name', 'LIKE', request('transportation'))->first();

        $state = State::where('name', 'LIKE', request('states'))->first();

        try
        {
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
            $report->active = ($request['active'] ? true : false);
            $report->save();

            if ($request->has('evidence_file'))
            {
                foreach($report->evidence as $evidence)
                {
                    // File::delete('public/image/users/'.$user->avatar_path);
                    $path = public_path() . '/evidence/'. $report->id . '/' . $evidence->multimedia_path;
                    if(file_exists($path)) {
                        unlink($path);
                    }
                }
                
                $report->evidence()->delete();

                $evidence = request('evidence_file');
                $i = 0;
                foreach($evidence as $e)
                {
                    $filename = '';
                    $extension = $e->getClientOriginalExtension();
                    $filename = time().'_'.$i++.'.'.$extension;
                    $e->move('evidence/'.$report->id, $filename);

                    $cat_evidence = CatEvidence::get_cat_evidence($extension);
                    if ($cat_evidence != null)
                    {
                        Evidence::create([
                            'report_id' => $report->id,
                            'multimedia_path' => $filename,
                            'cat_evidence_id' => $cat_evidence->id
                        ]);
                    }else
                    {
                        // Not supported type
                    }
                }
            }else
            {
                $report->evidence()->delete();
            }

            $security_report = SecurityReport::where('report_id', $report->id)->first();
            $security_report->cat_transportation_id = $transportation->id;
            $security_report->cat_weapon_id = $weapon->id;
            $security_report->save();

            $security_report->victims()->delete();

            if ($request->has('victim_gender'))
            {
                $victims = request('victim_gender');
                foreach($victims as $victim)
                {
                    Victim::create([
                        'security_report_id' => $security_report->id,
                        'gender_id' => $victim
                    ]);
                }
            }

            $security_report->perpetrators()->delete();

            if ($request->has('perpetrator_gender')
                && $request->has('perpetrator_description'))
            {
                $perpetrator_genders = request('perpetrator_gender');
                $perpetrator_descriptions = request('perpetrator_description');
                if (count($perpetrator_genders) == count($perpetrator_descriptions))
                {
                    for($i = 0; $i < count($perpetrator_descriptions); ++$i)
                    {
                        $perp = Perpetrator::create([
                            'description' => $perpetrator_descriptions[$i],
                            'security_report_id' => $security_report->id,
                            'gender_id' => $perpetrator_genders[$i]
                        ]);
                    }
                }
            }

            session()->flash('message', 'Reporte Editado');

        }catch(ModelNotFoundException $err){
            //Show error page
        }

        return redirect('/');
    }
}
