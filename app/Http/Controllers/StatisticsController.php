<?php

namespace App\Http\Controllers;

use App\Incident;
use App\TypeOfIncident;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('statistics.index');
    }

    public function bar()
    {
        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        return view('statistics.bar', compact('date'));
    }

    public function pie()
    {
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        return view('statistics.pie', compact('types'));
    }

    public function chart()
    {
        $month_qty = DB::select( DB::raw("SELECT MONTH(date) as month, count(*) qty FROM incidents WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)"));


        $dic = array();
        foreach($month_qty as $mq)
        {
            $dateObj   = DateTime::createFromFormat('!m', $mq->month);
            $monthName = $dateObj->format('F');

            $dic[$monthName] = $mq->qty;
        }

        return view('statistics.char', compact('dic'));
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

    public function crime_per_type(Request $request)
    {
        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
    } 

    public function crime_per_gender(Request $request)
    {
        //$crimeType
    } 
}
