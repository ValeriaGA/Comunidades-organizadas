<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use App\CommunityGroup;
use App\CommunityAdmin;
use App\District;
use App\Canton;
use App\Province;
use App\User;
use App\Role;

class AdministrationCommunityController extends Controller
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
        $communities = Community::orderBy('name', 'asc')->get();
        return view('administration.community.community.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $community_admin_role = Role::where('name', 'LIKE', 'Administrador de Comunidad')->first();
        $community_admins = User::where('role_id', $community_admin_role->id)->get();
        return view('administration.community.community.create', compact('community_admins'));
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
            'name' => 'required|string|max:255',
            'district' => 'required',
            'administrator' => 'required'
        ]);

        $district = District::findOrFail($request['district']);

        $community = Community::create([
            'name' => $request['name'],
            'district_id' => $district->id
        ]);

        $community_group = CommunityGroup::create([
            'name' => $request['name']
        ]);
        $community_group->community()->attach($community->id);
        
        $user_ids = $request['administrator'];

        $users = collect();
        foreach ($user_ids as $id)
        {
            $user = User::findOrFail($id);
            $users->push($user);
        }

        foreach($users as $user)
        {
            $user->makeCommunityAdmin($community);
            $communityAdmin = CommunityAdmin::where('user_id', $user->id)->first();

            $communityAdmin->community()->attach($community->id);
        }

        session()->flash('message', 'Comunidad Creada');

        return redirect('/administracion/comunidades/comunidad');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate(request(), [
            'district' => 'required'
        ]);

        $communities = Community::where('district_id', $request['district'])->orderBy('name', 'asc')->get();
        return view('administration.community.community.index', compact('communities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Community $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        $community_admin_role = Role::where('name', 'LIKE', 'Administrador de Comunidad')->first();
        $community_admins = User::where('role_id', $community_admin_role->id)->get();

        $current_admins_id = array();
        foreach($community->communityAdmin as $admin)
        {
            array_push($current_admins_id, $admin->user->id);
        }

        $districts = District::where('canton_id', $community->district->canton_id)->get();
        $cantons = Canton::where('province_id', $community->district->canton->province_id)->get();
        $provinces = Province::all();

        return view('administration.community.community.edit', compact('community', 'provinces', 'cantons', 'districts', 'community_admins', 'current_admins_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'district' => 'required',
            'administrator' => 'required'
        ]);

        $district = District::findOrFail($request['district']);

        $community->update([
            'name' => $request['name'],
            'district_id' => $district->id
        ]);

        $user_ids = $request['administrator'];

        $users = collect();
        foreach ($user_ids as $id)
        {
            $user = User::findOrFail($id);
            $users->push($user);
        }

        foreach($community->communityAdmin as $admin)
        {
            $community->communityAdmin()->detach($admin);
        }

        foreach($users as $user)
        {
            $user->makeCommunityAdmin($community);
            $communityAdmin = CommunityAdmin::where('user_id', $user->id)->first();

            $communityAdmin->community()->attach($community->id);
        }

        session()->flash('message', 'Comunidad actualizado');
        return redirect('/administracion/comunidades/comunidad');
    }
}
