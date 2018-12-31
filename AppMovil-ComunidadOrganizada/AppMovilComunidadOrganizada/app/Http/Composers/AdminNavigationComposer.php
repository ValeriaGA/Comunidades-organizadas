<?php namespace App\Http\Composers;


use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Report;

class AdminNavigationComposer {
	
	public function compose(View $view)
	{
        $alert_qty = DB::table('report_alert')->count(DB::raw('DISTINCT report_id'));
        $view->with('alert_qty', $alert_qty);
	}
}