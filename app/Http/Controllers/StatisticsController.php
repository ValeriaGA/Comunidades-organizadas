<?php

namespace App\Http\Controllers;

use App\Incident;
use App\TypeOfIncident;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


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

        $first_incident = DB::table('type_of_incidents')->first();
        
        $id = $first_incident->id;
        //$id = $_POST["delitos"];
        $users_count = DB::table('incidents')
                     ->select(DB::raw('count(*) as count, primary_victim_sex'))
                     ->where('type_id', $id)
                     ->groupBy('primary_victim_sex')
                     ->get();
        $count = array();
        $total = 0; 
        foreach($users_count as $users)
        {
            if ($users->primary_victim_sex == 'm') {
                $count['masculino'] = $users->count;
                $total += $users->count;
            }elseif ($users->primary_victim_sex == 'f') {
                $count['femenino'] = $users->count;
                $total += $users->count;
            }else {
                $count['otro'] = $users->count;
                $total += $users->count;
            }
        }

      return view('statistics.pie', compact('types','count','total'));
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

    
    public function crime_per_type(Request $request)
    {
        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        $first_date = request('first_date');
        $final_date = request('final_date');
        $incidents = TypeOfIncident::whereBetween('created_at',[$first_date,$final_date])->get();
        $countIncidents = count($incidents);

    } 

    public function crime_per_gender(Request $request)
    {
        //$crimeType
        $id_type = request('delitos');
        $first_incident = DB::table('type_of_incidents')
                        ->where('type_id', $id_type)   
                        ->first();
        
        $id = $first_incident->id;
        $users_count = DB::table('incidents')
                     ->select(DB::raw('count(*) as count, primary_victim_sex'))
                     ->where('type_id', $id)
                     ->groupBy('primary_victim_sex')
                     ->get();
        $count = array();
        $total = 0; 
        foreach($users_count as $users)
        {
            if ($users->primary_victim_sex == 'm') {
                $count['masculino'] = $users->count;
                $total += $users->count;
            }elseif ($users->primary_victim_sex == 'f') {
                $count['femenino'] = $users->count;
                $total += $users->count;
            }else {
                $count['otro'] = $users->count;
                $total += $users->count;
            }
        }

      return view('statistics.pie', compact('count','total'));
    } 
}
