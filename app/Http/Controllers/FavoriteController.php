<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunityGroup;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $service_reports = auth()->user()->fetchAllFavoriteServiceReports();

        $security_reports = auth()->user()->fetchAllFavoriteSecurityReports();

        $news = auth()->user()->fetchAllFavoriteNews();

        $community_groups = auth()->user()->communityGroup;

        return view('favorite.index', compact('news', 'security_reports', 'service_reports', 'community_groups'));
    }

    public function show(Request $request)
    {
    	$this->validate(request(), [
            'community_group' => 'required'
        ]);

        $community_group = CommunityGroup::findOrFail(request('community_group'));

        $service_reports = auth()->user()->fetchFavoriteServiceReports($community_group);

        $security_reports = auth()->user()->fetchFavoriteSecurityReports($community_group);

        $news = auth()->user()->fetchFavoriteNews($community_group);

        $community_groups = auth()->user()->communityGroup;

        return view('favorite.index', compact('news', 'security_reports', 'service_reports', 'community_groups'));
    }
}
