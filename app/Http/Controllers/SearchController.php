<?php

namespace App\Http\Controllers;
use App\Report;
use App\SubCatReport;
use App\CommunityGroup;
use App\Community;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SubCatReport::orderBy('name', 'asc')->get();

        $categories_id = array();
        foreach ($categories as $category)
        {
            $categories_id[] = $category->id;
        }

        $reports = Report::latest()->get(); 

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');

        return view('search.index', compact('categories', 'categories_id', 'reports', 'date'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate(request(), [
            'date' => 'date|before_or_equal:today'
        ]);

        $categories = SubCatReport::orderBy('name', 'asc')->get();

        $match = array();
        $categories_id = array();
        $groups_id = array();
        $reports = array();

        foreach($categories as $category)
        {
            if ($request->has('category_'.$category->id))
            {
                $categories_id[] = $category->id;
            }
        }

        if ($request->has('date') ? true : false)
        {
            $match[] = ['date', '=', request('date')];
        }

        if ($request->has('community') ? true : false)
        {
            $community = Community::findOrFail(request('community'));

            foreach ($community->communityGroup as $group)
            {
                $groups_id[] = $group->id;
            }

            $reports = Report::where($match)
                ->whereIn('community_group_id', $groups_id)
                ->whereIn('sub_cat_report_id', $categories_id)
                ->latest()
                ->get();
        }else
        {
            $reports = Report::where($match)
                ->whereIn('sub_cat_report_id', $categories_id)
                ->latest()
                ->get();
        }

        

        $date = request('date');

        return view('search.index', compact('categories', 'categories_id', 'reports', 'date'));
    }
}
