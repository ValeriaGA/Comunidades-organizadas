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
        $this->authorize('create', Report::class);
        $request->validated();
        Auth::user()->addNews( $request );

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
     * Update the specified resource in storage.
     *
     * @param  StoreNewsReport  $request
     * @param  Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewsReport $request, Report $report)
    {
        $this->authorize('update', $report);
        $request->validated();
        $report->editNews( $request );

        session()->flash('message', 'Reporte Editado');

        return redirect('/');
    }
}
