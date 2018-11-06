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
        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        $first_date = request('first_date');
        $final_date = request('final_date');
        $count_per_type = DB::table('incidents')
                     ->select(DB::raw('count(*) as count, type_id'))
                     ->whereBetween('created_at',[$first_date,$final_date])
                     ->groupBy('type_id')
                     ->get();

        $count_per_type1 = array();
        foreach ($count_per_type as $count_type) {
            foreach ($types as $type) {
                if ($type->id == $count_type->type_id) {
                    $sub_list1=array($type->name,$count_type->count);
                    array_push($count_per_type1, $sub_list1);
                }
            }
        }
        return view('statistics.bar', compact('date','types','count_per_type1'));
    }

    public function pie()
    {
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        
        $id = request('delitos');
        
        $selected_incident = DB::table('type_of_incidents')->where('id', $id)->get();
        foreach ($selected_incident as $key) {
            $selected_incident_name = $key->name;
        }
        
        $users_count = DB::table('incidents')
                     ->select(DB::raw('count(*) as count, primary_victim_sex'))
                     ->where('type_id', $id)
                     ->groupBy('primary_victim_sex')
                     ->get();
        $count_per_gender = array();
        $total = 0; 
        foreach($users_count as $users)
        {
            if ($users->primary_victim_sex == 'm') {
                $count_per_gender['masculino'] = $users->count;
                $total += $users->count;
            }elseif ($users->primary_victim_sex == 'f') {
                $count_per_gender['femenino'] = $users->count;
                $total += $users->count;
            }else {
                $count_per_gender['otro'] = $users->count;
                $total += $users->count;
            }
        }

      return view('statistics.pie', compact('types','count_per_gender','total','selected_incident_name'));
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
        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        $first_date = request('first_date');
        $final_date = request('final_date');
        $count_per_type = DB::table('incidents')
                     ->select(DB::raw('count(*) as count, type_id'))
                     ->whereBetween('created_at',[$first_date,$final_date])
                     ->groupBy('type_id')
                     ->get();

        $count_per_type1 = array();
        foreach ($count_per_type as $count_type) {
            foreach ($types as $type) {
                if ($type->id == $count_type->type_id) {
                    $sub_list1=array($type->name,$count_type->count);
                    array_push($count_per_type1, $sub_list1);
                }
            }
        }
        return view('statistics.bar', compact('types','count_per_type1','date'));
    } 

    public function crime_per_gender(Request $request)
    {
        
        $types = TypeOfIncident::orderBy('name', 'asc')->get();
        
        $id = request('delitos');
        
        $selected_incident = DB::table('type_of_incidents')->where('id', $id)->get();
        foreach ($selected_incident as $key) {
            $selected_incident_name = $key->name;
        }
        $users_count = DB::table('incidents')
                     ->select(DB::raw('count(*) as count, primary_victim_sex'))
                     ->where('type_id', $id)
                     ->groupBy('primary_victim_sex')
                     ->get();
        $count_per_gender = array();
        $total = 0; 
        foreach($users_count as $users)
        {
            if ($users->primary_victim_sex == 'm') {
                $count_per_gender['masculino'] = $users->count;
                $total += $users->count;
            }elseif ($users->primary_victim_sex == 'f') {
                $count_per_gender['femenino'] = $users->count;
                $total += $users->count;
            }else {
                $count_per_gender['otro'] = $users->count;
                $total += $users->count;
            }
        }

      return view('statistics.pie', compact('types','count_per_gender','total','id_type','selected_incident_name'));
    } 
}
