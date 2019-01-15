<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\CatReport;
use App\SubCatReport;
use App\Like;
use App\CommunityGroup;
use App\Community;
use App\District;
use App\Canton;
use App\Province;

class HomeController extends Controller
{

    public function index()
    {
        $service_reports = Report::fetchRecentService();
        $security_reports = Report::fetchRecentSecurity();
        $news = Report::fetchRecentNews();

        return view('home', compact('news', 'security_reports', 'service_reports'));
    }

    public function showRecent()
    {
        $service_reports = Report::fetchService();
        $security_reports = Report::fetchSecurity();
        $news = Report::fetchNews();

        return view('home', compact('news', 'security_reports', 'service_reports'));
    }

    public function showPopular()
    {
        
    }

    public function show(Request $request)
    {

        $this->validate(request(), [
            'community_group_name' => 'string|max:255'
        ]);

        // Filter groups by name if input was passed
        $community_groups = NULL;
        if ($request->has('community_group_name'))
        {
            $community_groups = CommunityGroup::where('name', 'LIKE', '%'.request('community_group').'%');
        }
        $community_group_ids = array();
        foreach($community_groups as $groups)
        {
            array_push($community_group_ids, $groups->id);
        }


        // Filter through dropdowns
        $community_group = NULL;
        $community = NULL;
        $district = NULL;
        $canton = NULL;
        $province = NULL;
        if ($request->has('community_group'))
        {
            $community_group = CommunityGroup::findOrFail(request('community_group'));
        }else if ($request->has('community'))
        {
            $community = Community::findOrFail(request('community'));
        }else if ($request->has('district'))
        {
            $district = District::findOrFail(request('district'));
        }else if ($request->has('canton'))
        {
            $canton = Canton::findOrFail(request('canton'));
        }else if ($request->has('province'))
        {
            $province = Province::findOrFail(request('province'));
        }
        

        //build queries

        // Service
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->first();
        $sub_cat_service = SubCatReport::where('cat_report_id', $cat_service->id)->get();
        $sub_cat_service_ids = array();
        foreach($sub_cat_service as $cat)
        {
            array_push($sub_cat_service_ids, $cat->id);
        }

        $service_reports = Report::whereIn('sub_cat_report_id', $sub_cat_service_ids)
                            ->where('community_group_id', $community_group->id)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->latest()
                            ->paginate(10);

        // Security
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();
        $sub_cat_security = SubCatReport::where('cat_report_id', $cat_security->id)->get();
        $sub_cat_security_ids = array();
        foreach($sub_cat_security as $cat)
        {
            array_push($sub_cat_security_ids, $cat->id);
        }

        $security_reports = Report::whereIn('sub_cat_report_id', $sub_cat_security_ids)
                            ->where('community_group_id', $community_group->id)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->latest()
                            ->paginate(10);

        // News
        $news = Report::where('news', true)
                        ->where('community_group_id', $community_group->id)
                        ->where('active', true)
                        ->latest()
                        ->paginate(10);

        return view('home', compact('news', 'security_reports', 'service_reports'));
    }
}
