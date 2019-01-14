<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\CatReport;
use App\SubCatReport;
use App\Like;
use App\CommunityGroup;

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
            'community_group' => 'required'
        ]);

        $community_group = CommunityGroup::findOrFail(request('community_group'));

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

        $news = Report::where('news', true)
                        ->where('community_group_id', $community_group->id)
                        ->where('active', true)
                        ->latest()
                        ->paginate(10);

        return view('home', compact('news', 'security_reports', 'service_reports'));
    }
}
