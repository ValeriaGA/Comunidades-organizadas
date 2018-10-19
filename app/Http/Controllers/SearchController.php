<?php

namespace App\Http\Controllers;
use App\Incident;
use App\TypeOfIncident;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        $incidents = Incident::latest()->get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');

        return view('search.index', compact('types', 'incidents', 'date'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // location
        // date
        // sex
        // 
        $this->validate(request(), [
            'date' => 'date|before_or_equal:today'
        ]);

        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        // $match = [['location', 'LIKE',  '%' . request('location') . '%'], ['date' => request('date')]];

        //where('location', 'LIKE', '%' . request('location') . '%')
        // where($match)

        // if ($request->has('location') ? true : false)
        // {
        //     $incidents = Incident::location(request('location'));
        // }

        $match = array();

        if ($request->has('location') ? true : false)
        {
            $match[] = ['location', 'LIKE',  '%' . request('location') . '%'];
        }

        if ($request->has('date') ? true : false)
        {
            $match[] = ['date', '=', request('date')];
        }

        if ($request->has('sex') ? true : false)
        {
            if (request('sex') == "Masculino") $match[] = ['primary_victim_sex', 'LIKE', 'm'];
            else if (request('sex') == "Femenino") $match[] = ['primary_victim_sex', 'LIKE', 'f'];
        }

        $incidents = Incident::where($match)
                ->latest()
                ->get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');

        return view('search.index', compact('types', 'incidents', 'date'));
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
