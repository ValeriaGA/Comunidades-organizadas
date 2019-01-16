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
        // $this->validate(request(), [
        //     'community_group_name' => 'max:255'
        // ]);

        // Filter groups by name if input was passed
        $group_name = request('community_group_name');

        if ($request->has('community_group') && request('community_group') != null)
        {
            $filtered_group = CommunityGroup::findOrFail(request('community_group'));

            $service_reports = Report::fetchServiceByGroupOrGroupName($filtered_group, $group_name);
            $security_reports = Report::fetchSecurityByGroupOrGroupName($filtered_group, $group_name);
            $news = Report::fetchNewsByGroupOrCommunities($filtered_group, $group_name);

        }else if ($request->has('community') && request('community') != null)
        {
            $filtered_community = Community::findOrFail(request('community'));

            $service_reports = Report::fetchServiceByCommunityOrGroupName($filtered_community, $group_name);
            $security_reports = Report::fetchSecurityByCommunityOrGroupName($filtered_community, $group_name);
            $news = Report::fetchNewsByCommunityOrGroupName($filtered_community, $group_name);

        }else if ($request->has('district') && request('district') != null)
        {
            $filtered_district = District::findOrFail(request('district'));

            $service_reports = Report::fetchServiceByDistrictOrGroupName($filtered_district, $group_name);
            $security_reports = Report::fetchSecurityByDistrictOrGroupName($filtered_district, $group_name);
            $news = Report::fetchNewsByDistrictOrGroupName($filtered_district, $group_name);
        }else if ($request->has('canton') && request('canton') != null)
        {
            $filtered_canton = Canton::findOrFail(request('canton'));

            $service_reports = Report::fetchServiceByCantonOrGroupName($filtered_canton, $group_name);
            $security_reports = Report::fetchSecurityByCantonOrGroupName($filtered_canton, $group_name);
            $news = Report::fetchNewsByCantonOrGroupName($filtered_canton, $group_name);
        }else if ($request->has('province') && request('province') != null)
        {
            $filtered_province = Province::findOrFail(request('province'));

            $service_reports = Report::fetchServiceByProvinceOrGroupName($filtered_province, $group_name);
            $security_reports = Report::fetchSecurityByProvinceOrGroupName($filtered_province, $group_name);
            $news = Report::fetchNewsByProvinceOrGroupName($filtered_province, $group_name);
        }else
        {
            $service_reports = Report::fetchServiceByGroupName($group_name);
            $security_reports = Report::fetchSecurityByGroupName($group_name);
            $news = Report::fetchNewsByGroupName($group_name);
        }

        return view('home', compact('news', 'security_reports', 'service_reports'));
    }
}
