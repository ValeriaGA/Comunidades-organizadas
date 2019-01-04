<?php namespace App\Http\Composers;


use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Report;
use App\CommunityRequest;
use App\CommunityGroupRequest;

class AdminNavigationComposer {
	
	public function compose(View $view)
	{
        $alert_qty = DB::table('report_alert')->count(DB::raw('DISTINCT report_id'));
        $request_qty = (count(CommunityRequest::all())) + (count(CommunityGroupRequest::all()));
        $view->with(compact('alert_qty', 'request_qty'));
	}
}