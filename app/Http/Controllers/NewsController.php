<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsReport;
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

class NewsController extends Controller
{

    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('admin_community')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $community_groups = CommunityGroup::all();

        $categories = SubCatReport::all();

        $cat_evidence = CatEvidence::get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        return view('report.news.create', compact('categories', 'cat_evidence', 'date', 'time', 'community_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNewsReport  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsReport $request)
    {
        $validated = $request->validated();

        $categories_news = SubCatReport::where('name', 'LIKE', request('type'))->first();

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
            'sub_cat_report_id' => $categories_news->id,
            'user_id' => Auth::user()->id,
            'active' => true,
            'news' => true
        ]);

        if ($request->has('evidence_file'))
        {
            $evidence = request('evidence_file');
            foreach($evidence as $e)
            {
                $filename = '';
                $extension = $e->getClientOriginalExtension();
                $filename = time().'.'.$extension;
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

        session()->flash('message', 'Noticia Creada');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
