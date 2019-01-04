<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $community_requests = CommunityRequest::all();
        $group_requests = CommunityGroupRequest::all();
        return view('administration.request.index', compact('community_requests', 'group_requests'));
    }
}
