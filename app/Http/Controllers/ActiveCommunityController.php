<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use Auth;

class ActiveCommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_community');
    }

    public function update(Request $request)
    {
    	$this->validate(request(), [
            'community' => 'required',
        ]);

        $community = Community::findOrFail($request['community']);

        if (Auth::user()->communityAdmin->community->contains('id', $community->id))
        {
        	Auth::user()->communityAdmin->update([
	            'active_community_id' => $request['community']
	        ]);

	        session()->flash('message', 'Comunidad activa actualizada');
        }
        

        
        return redirect()->back();
    }
}
