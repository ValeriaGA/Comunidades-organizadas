<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CatRequestState;
use App\CommunityRequest;
use App\CommunityGroupRequest;

class AdministrationRequestController extends Controller
{
     public function __construct()
    {
        
        // only administrators are allowed to view this
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_state = CatRequestState::where('name', 'Pendiente')->first();
        $community_requests = CommunityRequest::where('cat_request_state_id', $cat_state->id)->get();
        $group_requests = CommunityGroupRequest::where('cat_request_state_id', $cat_state->id)->get();
        return view('administration.request.index', compact('community_requests', 'group_requests'));
    }
}
