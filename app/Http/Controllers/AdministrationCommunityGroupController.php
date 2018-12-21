<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\CommunityGroup;

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
        //$community_groups = CommunityGroup::all();
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
            'name' => 'required|string|max:255|unique:community_groups,name'
        ]);

        CommunityGroup::create([
            'name' => $request['name']
        ]);

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
            'district' => 'required'
        ]);

        $communities = CommunityGroup::where('district_id', $request['district'])->orderBy('name', 'asc')->get();
        return view('administration.community.community.index', compact('communities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CommunityGroup $community_group
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityGroup $community_group)
    {
        return view('administration.community.groups.edit', compact('community_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:community_groups,name'
        ]);

        try{
            $community_group = CommunityGroup::findOrFail($id);

            $community_group->name = $request['name'];

            $community_group->save();

            session()->flash('message', 'Grupo de comunidades actualizado');
            return redirect('/administracion/comunidades/grupos');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }
}
