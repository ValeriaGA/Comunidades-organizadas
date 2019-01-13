<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatReport;
use App\SubCatReport;
use App\Report;
use App\CatEvidence;
use App\CatTransportation;
use App\CatWeapon;
use App\Gender;
use App\State;
use App\CommunityGroup;
use App\District;
use App\Canton;
use App\Province;
use App\Comment;
use Auth;
use DateTime;
use DateTimeZone;

class ReportController extends Controller
{
    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('auth')->except(['show']);
    }

    public function show(Report $report)
    {
        $generalComments = null;
        $userComments = null;

        if (Auth::check())
        {
            $userComments = Comment::select('users.email', 'users.avatar_path', 'users.id',
                                        'comments.comment', 'comments.user_id', 'comments.id')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    -> where('user_id', '=', Auth::id())
                                    -> where('report_id', '=', $report->id)
                                    -> get();

            $generalComments = Comment::select('users.email', 'users.avatar_path', 'users.id',
                                            'comments.comment', 'comments.user_id', 'comments.id')
                                        ->join('users', 'users.id', '=', 'user_id')
                                        -> where('user_id', '<>', Auth::id())
                                        -> where('report_id', '=', $report->id)
                                        -> get();
        }
        else
        {
            $generalComments = Comment::select('users.email', 'users.avatar_path', 'users.id',
                                        'comments.comment', 'comments.user_id', 'comments.id')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    -> where('report_id', '=', $report->id)
                                    -> get();
        }

        if ($report->news == 1)
        {
            return view('report.news.show', compact('report', 'generalComments', 'userComments'));
        }else if ($report->subCatReport->CatReport->name == 'Seguridad')
        {
            return view('report.security.show', compact('report', 'generalComments', 'userComments'));
        }else if ($report->subCatReport->CatReport->name == 'Servicio')
        {
            return view('report.service.show', compact('report', 'generalComments', 'userComments'));
        }else
        {
            // 
        }
    }

    public function edit(Report $report)
    {
        $this->authorize('update', $report);

        $cat_evidence = CatEvidence::where('active', true)->get();
        $genders = Gender::all();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        $communityGroups = $report->communityGroup->community[0]->communityGroup;

        $communities = $report->communityGroup->community;
        $current_communities_id = array();
        foreach($communities as $community)
        {
            array_push($current_communities_id, $community->id);
        }

        $districts = District::where('canton_id', $report->communityGroup->community[0]->district->canton_id)->get();
        $cantons = Canton::where('province_id', $report->communityGroup->community[0]->district->canton->province_id)->get();
        $provinces = Province::all();
  
        if ($report->news == true)
        {
            $categories = SubCatReport::all(); 
            return view('report.news.edit', compact('report', 'categories', 'cat_evidence', 'date', 'time', 'community_groups', 'provinces', 'cantons', 'districts', 'current_communities_id', 'communityGroups'));


        }else if ($report->subCatReport->CatReport->name == 'Seguridad')
        {
            $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();
            $categories = SubCatReport::where('cat_report_id', $cat_security->id)->get();        
            
            $cat_transportation = CatTransportation::get();
            $cat_weapon = CatWeapon::get();

            return view('report.security.edit', compact('report', 'categories', 'cat_evidence', 'cat_transportation', 'cat_weapon', 'date', 'time', 'community_groups', 'genders', 'provinces', 'cantons', 'districts', 'current_communities_id', 'communityGroups'));


        }else if ($report->subCatReport->CatReport->name == 'Servicio')
        {
            $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->first();
            $categories = SubCatReport::where('cat_report_id', $cat_service->id)->get();

            return view('report.service.edit', compact('report', 'categories', 'cat_evidence', 'date', 'time', 'community_groups', 'provinces', 'cantons', 'districts', 'current_communities_id', 'communityGroups'));
        }else
        {
            // 
        }
    }
}
