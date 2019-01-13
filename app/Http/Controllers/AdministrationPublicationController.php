<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\State;
use App\ReportAlert;

class AdministrationPublicationController extends Controller
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
        $reports = Report::all();
        return view('administration.publication.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('administration.publication.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $states = State::all();
        return view('administration.publication.edit', compact('report', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $this->validate(request(), [
            'state' => 'required'
        ]);

        $state = State::where('name', 'LIKE', request('state'))->firstOrFail();

        $report->update([
            'state_id' => $state->id,
            'active' => (request('active') ? true : false)
        ]);

        session()->flash('message', 'Reporte actualizado');

        return redirect('/administracion/publicaciones/'.$report->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //$report->deleteDependencies();
        $report->delete();

        session()->flash('message', 'Publicación Removida');

        return redirect('/administracion/publicaciones/');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  ReportAlert $reportAlert
     * @return \Illuminate\Http\Response
     */
    public function ignore(Report $report)
    {
        foreach ($report->reportAlert as $reportAlert)
        {
            // ReportAlert::destroy($reportAlert->id);
            $reportAlert->delete();
        }
        
        session()->flash('message', 'Reportes de publicación removidos');

        return redirect('/administracion/reportes/');
    }

    public function toggle(Report $report)
    {
        request()->has('active') ? $report->activate() : $report->deactivate();
        
        return back();
    }
}
