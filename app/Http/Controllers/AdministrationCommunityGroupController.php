<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\CommunityGroup;
use App\Community;

class AdministrationCommunityGroupController extends Controller
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
        $community_groups = CommunityGroup::orderBy('name', 'asc')->get();
        
        return view('administration.community.groups.index', compact('community_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.community.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:community_groups,name',
            'community' => 'required'
        ]);

        $community_ids = $request['community'];

        $communities = collect();
        foreach ($community_ids as $id)
        {
            $community = Community::find($id);
            $communities->push($community);
        }

        $community_group = CommunityGroup::create([
            'name' => $request['name']
        ]);

        foreach($communities as $community)
        {
            $community_group->community()->attach($community->id);
        }

        session()->flash('message', 'Grupo de communidades creada');

        return redirect('/administracion/comunidades/grupos');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate(request(), [
            'community' => 'required'
        ]);

        $community = Community::find($request['community']);

        $community_groups = $community->communityGroup;

        return view('administration.community.groups.index', compact('community_groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CommunityGroup $community_group
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityGroup $community_group)
    {
        $communities = $community_group->community;
        return view('administration.community.groups.edit', compact('community_group', 'communities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityGroup $community_group)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:community_groups,name,'.$community_group->id,
            'community' => 'required'
        ]);

        try{

            $community_ids = $request['community'];
            $communities = collect();
            foreach ($community_ids as $id)
            {
                $community = Community::find($id);
                $communities->push($community);
            }

            $community_group = CommunityGroup::findOrFail($community_group->id);

            $community_group->name = $request['name'];

            // detach
            foreach($community_group->community as $old)
            {
                $community_group->community()->detach($old->id);
            }

            foreach($communities as $community)
            {
                $community_group->community()->attach($community->id);
            }

            $community_group->save();

            session()->flash('message', 'Grupo de comunidades actualizado');
            return redirect('/administracion/comunidades/grupos');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }
}
