<?php

namespace App\Http\Controllers;

use App\Incident;
use App\SubCatReport;
use App\Gender;
use App\CatReport;
use App\Province;
use App\Canton;
use App\District;
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

    public function securityBar()
    {
        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');

        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);

        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $types = SubCatReport::where('cat_report_id', $cat_security[0]->id)
                                -> orderBy('name', 'asc')
                                ->get();

        $first_date = $date;
        $final_date = $date;
        $count_per_type = DB::table('reports')
                     ->select(DB::raw('count(*) as count, sub_cat_report.id'))
                     ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                     ->join('cat_report', 'sub_cat_report.cat_report_id', '=', 'cat_report.id')
                     ->where('cat_report.id', '=', $cat_security[0]->id)
                     ->whereBetween('date',[$first_date,$final_date])
                     ->groupBy('sub_cat_report.id')
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
   
        return view('statistics.securityBar', compact('first_date', 'final_date','types','count_per_type2'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statisticsBySex()
    {
        $types = SubCatReport::where('cat_report_id', 3)->orderBy('name', 'asc')->get();
        
        $selected_incident = DB::table('sub_cat_report')->where('cat_report_id', 3)->get();
        foreach ($selected_incident as $key) {
            $selected_incident_name = $key->name;
        }

        $countByGender = DB::table('victims')
                        -> select('genders.name as gender')
                        -> join('security_reports', 'victims.security_report_id', '=', 'security_reports.id')
                        -> join('reports', 'security_reports.report_id', '=', 'reports.id')
                        -> join('genders', 'victims.gender_id', '=', 'genders.id')
                        -> join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                        -> where('sub_cat_report.name', $selected_incident_name)
                        -> selectRaw('count(victims.id) as victimsNumber')
                        -> groupBy('genders.name')
                        -> get();

                
        $total = DB::table('victims')
        -> join('security_reports', 'victims.security_report_id', '=', 'security_reports.id')
        -> join('reports', 'security_reports.report_id', '=', 'reports.id')
        -> join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
        -> where('sub_cat_report.name', $selected_incident_name)
        -> selectRaw('count(victims.id) as victimsNumber')
        -> first() -> victimsNumber;
       

        $count_per_gender = array();
        foreach($countByGender as $genderCount)
        {
            $count_per_gender[$genderCount -> gender] = $genderCount -> victimsNumber;
        }


        $date = '2019';
        $selectedStartDate = '2019';
        $selectedEndDate = '2019';
        return view('statistics.genderPie', compact('types','count_per_gender','total',
                                                'selected_incident_name', 
                                                'date', 'selectedStartDate', 'selectedEndDate'));
    }

     /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function statisticsBySexIncident(Request $request)
    {
        $types = SubCatReport::where('cat_report_id', 3)->orderBy('name', 'asc')->get();
        
        $selected_incident = DB::table('sub_cat_report')->where('cat_report_id', 3)->get();
        

        $id = request('delitos');
        $date = '2019';
        $selectedStartDate = request('startYear');
        $selectedEndDate = request('endYear');

        $selected_incident_name = SubCatReport::select('name')
                                            -> where('id', $id)
                                            ->first() -> name;

        $countByGender = DB::table('victims')
                        -> select('genders.name as gender')
                        -> join('security_reports', 'victims.security_report_id', '=', 'security_reports.id')
                        -> join('reports', 'security_reports.report_id', '=', 'reports.id')
                        -> join('genders', 'victims.gender_id', '=', 'genders.id')
                        -> join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                        -> where('sub_cat_report.id', $id)
                        -> selectRaw('count(victims.id) as victimsNumber')
                        -> whereYear('reports.date', '>=', $selectedStartDate)
                        -> whereYear('reports.date', '<=', $selectedEndDate)
                        -> groupBy('genders.name')
                        -> get();

                
        $total = DB::table('victims')
        -> join('security_reports', 'victims.security_report_id', '=', 'security_reports.id')
        -> join('reports', 'security_reports.report_id', '=', 'reports.id')
        -> join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
        -> where('sub_cat_report.id', $id)
        -> whereYear('reports.date', '>=', $selectedStartDate)
        -> whereYear('reports.date', '<=', $selectedEndDate)
        -> selectRaw('count(victims.id) as victimsNumber')
        -> first() -> victimsNumber;
       

        $count_per_gender = array();
        foreach($countByGender as $genderCount)
        {
            $count_per_gender[$genderCount -> gender] = $genderCount -> victimsNumber;
        }

        return view('statistics.genderPie', compact('types','count_per_gender','total',
                                                        'selected_incident_name', 
                                                        'date', 'selectedStartDate', 'selectedEndDate'));
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reports_per_province()
    {
        $communitiesPerProvince = DB::table('communities')
                                        -> select('provinces.id as provinceID')
                                        -> join('districts', 'districts.id', '=', 'communities.district_id')
                                        -> join('cantons', 'cantons.id', '=', 'districts.canton_id')
                                        -> join('provinces', 'provinces.id', '=', 'cantons.province_id')
                                        -> selectRaw('count(communities.id) as communitiesNumber')
                                        -> groupBy('provinceID')
                                        -> get();

        $provinces = Province::get();

        $count_per_province = array();

        foreach ($provinces as $province) {
            $found = false;
            foreach ($communitiesPerProvince as $count_type) {
                if (!$found)
                {
                    if ($province->id == $count_type->provinceID) {
                        $sub_list=array($province->id,$count_type->communitiesNumber);
                        array_push($count_per_province, $sub_list);
                        $found = true;
                    }
                }
            }
            if (!$found)
            {
                
                $sub_list=array($province->id, 0);
                array_push($count_per_province, $sub_list);
            }
        }

        return view('statistics.reports_per_province', compact('count_per_province'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chartByTime()
    {
        $month_qty = DB::select( DB::raw("SELECT MONTH(date) as month, count(*) qty FROM reports WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)"));
        $genders = Gender::get();

        $dic = array();
        foreach($month_qty as $mq)
        {
            $dateObj   = DateTime::createFromFormat('!m', $mq->month);
            $monthName = $dateObj->format('F');

            $dic[$monthName] = $mq->qty;
        }
        $date = '2019';
        $selectedDate = '2019';
        $selectedProcedence = "Ambos";
        $selectedGender = "";

        $provinces = Province::get();
        $selectedProvince = Province::where('id', '1')->first();
        $selectedCanton = $selectedProvince -> canton() -> first();
        $selectedDistrict = $selectedCanton -> district() -> first();
        $selectedCommunity = $selectedDistrict -> community() -> first();


        if ($selectedCommunity != null)
        {
            $selectedGroup = $selectedCommunity -> communityGroup() -> first();
        }
        else 
        {
            $selectedGroup = null;
        }

        

        $selectedItems = array(
            "selectedProvince" => $selectedProvince,
            "selectedCanton" => $selectedCanton,
            "selectedDistrict" => $selectedDistrict,
            "selectedCommunity" => $selectedCommunity,
            "selectedGroup" => $selectedGroup
        );

        $anyGroup = null;
        return view('statistics.char', compact('dic', 'date', 'selectedDate', 
                                'provinces', 'selectedProcedence', 'genders', 'selectedGender',
                                'selectedItems', 'anyGroup'));
    }


     /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function chartByTimeFilters(Request $request)
    {
        
        $selectedDate = request('date');
        $selectedProcedence = request('procedence');
        $procedence = -1;

        if ($selectedProcedence == "Nacionales")
            $procedence = 1;

        else if($selectedProcedence == "Extranjeros")
            $procedence = -1;

        $selectedGender = request('gender');
        $selectedProvinceID = request('province');
        $selectedCantonID = request('canton');
        $selectedDistrictID = request('district');
        $selectedCommunityID = request('community');
        $selectedGroupID = request('group');

        $anyGroup = request('noCommunitiesCheckbox');


        $genders = Gender::get();

        if (($selectedCommunityID == null && $selectedGroupID == null) || $anyGroup != null)
        {
            $month_qty = DB::select( 
                DB::raw(
                    "SELECT MONTH(date) as month, count(*) qty
                    FROM reports 
                    INNER JOIN users on users.id = reports.user_id 
                    INNER JOIN people on people.id = users.person_id
                    INNER JOIN genders on genders.id = people.gender_id
                    WHERE YEAR(date) = ". $selectedDate 
                    ." AND people.foreigner != " .$procedence." 
                    AND genders.name LIKE '%".$selectedGender."%' 
                    GROUP BY MONTH(date)"));
        }
        else
        {
            $month_qty = DB::select( 
                DB::raw(
                    "SELECT MONTH(date) as month, count(*) qty
                    FROM reports 
                    INNER JOIN users on users.id = reports.user_id 
                    INNER JOIN people on people.id = users.person_id
                    INNER JOIN genders on genders.id = people.gender_id
                    WHERE YEAR(date) = ". $selectedDate 
                    ." AND people.foreigner != " .$procedence." 
                    AND genders.name LIKE '%".$selectedGender."%' 
                    AND reports.community_group_id = ".$selectedGroupID." 
                    GROUP BY MONTH(date)"));
        }
        
        $dic = array();
        foreach($month_qty as $mq)
        {
            $dateObj   = DateTime::createFromFormat('!m', $mq->month);
            $monthName = $dateObj->format('F');

            $dic[$monthName] = $mq->qty;
        }
        $date = '2019';

        $provinces = Province::get();
        $selectedProvince = Province::where('id', $selectedProvinceID)->first();
        $selectedCanton = $selectedProvince -> canton() -> where('id', $selectedCantonID)->first();
 
        $selectedDistrict = $selectedCanton -> district() -> where('id', $selectedDistrictID)->first();

        $selectedCommunity = $selectedDistrict -> community()-> where('id', $selectedCommunityID)->first();

        if ($selectedCommunity != null)
            $selectedGroup = $selectedCommunity -> communityGroup()-> where('communities_by_groups.id', $selectedGroupID)->first();
        else 
            $selectedGroup = null;


    
        $selectedItems = array(
            "selectedProvince" => $selectedProvince,
            "selectedCanton" => $selectedCanton,
            "selectedDistrict" => $selectedDistrict,
            "selectedCommunity" => $selectedCommunity,
            "selectedGroup" => $selectedGroup
        );

        return view('statistics.char', compact('dic', 'date', 'selectedDate', 
                                'selectedProcedence', 'genders', 'selectedGender',
                                'provinces', 'selectedItems', 'anyGroup'));
    }
    

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function serviceBar()
    {
        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');

        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);

        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->get();
        $types = SubCatReport::where('cat_report_id', $cat_service[0]->id)
                                -> orderBy('name', 'asc')
                                ->get();

        $first_date = $date;
        $final_date = $date;
        $count_per_type = DB::table('reports')
            ->select(DB::raw('count(*) as count, sub_cat_report.id'))
            ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
            ->join('cat_report', 'sub_cat_report.cat_report_id', '=', 'cat_report.id')
            ->where('cat_report.id', '=', $cat_service[0]->id)
            ->whereBetween('date',[$first_date,$final_date])
            ->groupBy('sub_cat_report.id')
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
        return view('statistics.serviceBar', compact('first_date', 'final_date', 'types','count_per_type2'));
    } 


     /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function serviceByDate(Request $request)
    {

        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);

        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->get();
        $types = SubCatReport::where('cat_report_id', $cat_service[0]->id)
                                -> orderBy('name', 'asc')
                                ->get();

        $first_date = $request -> input('first_date');
        $final_date = $request -> input('final_date');

        $count_per_type = DB::table('reports')
            ->select(DB::raw('count(*) as count, sub_cat_report.id'))
            ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
            ->join('cat_report', 'sub_cat_report.cat_report_id', '=', 'cat_report.id')
            ->where('cat_report.id', '=', $cat_service[0]->id)
            ->whereBetween('date',[$first_date,$final_date])
            ->groupBy('sub_cat_report.id')
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
        return view('statistics.serviceBar', compact('first_date', 'final_date', 'types','count_per_type2'));
    } 

    
     /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function securityByDate(Request $request)
    {
        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');

        $this->validate(request(), [
            'final_date' => 'date|before_or_equal:today'
        ]);

        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $types = SubCatReport::where('cat_report_id', $cat_security[0]->id)
                                -> orderBy('name', 'asc')
                                ->get();

        $first_date = $request -> input('first_date');
        $final_date = $request -> input('final_date');
        $count_per_type = DB::table('reports')
                     ->select(DB::raw('count(*) as count, sub_cat_report.id'))
                     ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                     ->join('cat_report', 'sub_cat_report.cat_report_id', '=', 'cat_report.id')
                     ->where('cat_report.id', '=', $cat_security[0]->id)
                     ->whereBetween('date',[$first_date,$final_date])
                     ->groupBy('sub_cat_report.id')
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

        return view('statistics.securityBar', compact('first_date', 'final_date','types','count_per_type2'));
    } 

   
}
