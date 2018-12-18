<?php

namespace App\Http\Controllers;

use App\Incident;
use App\SubCatReport;
use App\Gender;
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
        $types = SubCatReport::orderBy('name', 'asc')->get();
        $first_date = '2013-10-10';
        $final_date = $date;
        $count_per_type = DB::table('reports')
                     ->select(DB::raw('count(*) as count, id'))
                     ->whereBetween('date',[$first_date,$final_date])
                     ->groupBy('id')
                     ->get();

        $count_per_type2 = array();

        foreach ($types as $type) {
            $found = false;
            foreach ($count_per_type as $count_type) {
                if (!$found)
                {
                    if ($type->id == $count_type->id) {
                        $sub_list=array($type->name,$count_type->count);
                        array_push($count_per_type2, $sub_list);
                        $found = true;
                    }
                }
            }
            if (!$found)
            {
                $sub_list=array($type->name, 0);
                array_push($count_per_type2, $sub_list);
            }
        }
       // foreach ($count_per_type2 as $count_type) {
       //  echo '<br/>Name: '.$count_type[0].'<br/>Count: '.$count_type[1];
       // }
        return view('statistics.bar', compact('date','types','count_per_type2'));
    }

    public function pie()
    {


        // $male = Gender::where('name', 'Masculino');
        // $female = Gender::where('name', 'Femenino');
        // $other = Gender::where('name', 'Otro');

        $types = SubCatReport::where('cat_report_id', 3)->orderBy('name', 'asc')->get();
        
        // $id = 1;
        
        $selected_incident = DB::table('sub_cat_report')->where('cat_report_id', 3)->get();
        foreach ($selected_incident as $key) {
            $selected_incident_name = $key->name;
        }
        
        // $users_count = DB::table('reports')
        //              ->select(DB::raw('count(*) as count, id'))
        //              ->where('id', $id)
        //              ->groupBy('id')
        //              ->get();
        $count_per_gender = array();
        $total = 3; 
        // foreach($users_count as $users)
        // {
        //     dd($users);
        //     if ($users->gender_id == $male->id) {
        //         $count_per_gender['masculino'] = $users->count;
        //         $total += $users->count;
        //     }elseif ($users->gender_id == $female->id) {
        //         $count_per_gender['femenino'] = $users->count;
        //         $total += $users->count;
        //     }else {
        //         $count_per_gender['otro'] = $users->count;
        //         $total += $users->count;
        //     }
        // }

        $count_per_gender['masculino'] = 1;
        $count_per_gender['femenino'] = 2;
        $count_per_gender['otro'] = 0;
      return view('statistics.pie', compact('types','count_per_gender','total','selected_incident_name'));
    }


    public function reports_per_province()
    {
        return view('statistics.reports_per_province');
    }

    public function chart()
    {
        $month_qty = DB::select( DB::raw("SELECT MONTH(date) as month, count(*) qty FROM reports WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)"));
        
        $dic = array();
        foreach($month_qty as $mq)
        {
            $dateObj   = DateTime::createFromFormat('!m', $mq->month);
            $monthName = $dateObj->format('F');

            $dic[$monthName] = $mq->qty;
        }
        $date = '2018';

        return view('statistics.char', compact('dic', 'date'));
    }

    public function chart_show(Request $request)
    {
        $date = '2018';
        if ($request->has('date') ? true : false)
        {
            $date = request('date');
        }

        $month_qty = DB::select( DB::raw("SELECT MONTH(date) as month, count(*) qty FROM reports WHERE YEAR(date) = " . $date . " GROUP BY MONTH(date)"));
        
        $dic = array();
        foreach($month_qty as $mq)
        {
            $dateObj   = DateTime::createFromFormat('!m', $mq->month);
            $monthName = $dateObj->format('F');

            $dic[$monthName] = $mq->qty;
        }

        return view('statistics.char', compact('dic', 'date'));
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
        $count_per_type = DB::table('reports')
                     ->select(DB::raw('count(*) as count, id'))
                     ->whereBetween('created_at',[$first_date,$final_date])
                     ->groupBy('id')
                     ->get();

        $count_per_type2 = array();

        foreach ($types as $type) {
            $found = false;
            foreach ($count_per_type as $count_type) {
                if (!$found)
                {
                    if ($type->id == $count_type->type_id) {
                        $sub_list=array($type->name,$count_type->count);
                        array_push($count_per_type2, $sub_list);
                        $found = true;
                    }
                }
            }
            if (!$found)
            {
                $sub_list=array($type->name, 0);
                array_push($count_per_type2, $sub_list);
            }
        }
        return view('statistics.bar', compact('types','count_per_type2','date'));
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
