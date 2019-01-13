<?php namespace App\Http\Composers;


use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Report;
use App\CatRequestState;
use App\CommunityRequest;
use App\CommunityGroupRequest;

class AdminNavigationComposer {
	
	public function compose(View $view)
	{
        $alert_qty = DB::table('report_alert')->count(DB::raw('DISTINCT report_id'));

        $cat_state = CatRequestState::where('name', 'Pendiente')->first();
        $community_requests = CommunityRequest::where('cat_request_state_id', $cat_state->id)->get();
        $group_requests = CommunityGroupRequest::where('cat_request_state_id', $cat_state->id)->get();

        $request_qty = (count($community_requests)) + (count($group_requests));
        $view->with(compact('alert_qty', 'request_qty'));
	}
}