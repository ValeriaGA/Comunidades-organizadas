<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use App\District;

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
        return view('administration.community.community.create');
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
            'district' => 'required'
        ]);

        $district = District::findOrFail($request['district']);

        Community::create([
            'name' => $request['name'],
            'district_id' => $district->id
        ]);

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
        return view('administration.community.community.edit', compact('community'));
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
            'district' => 'required'
        ]);

        $district = District::findOrFail($request['district']);

        $community->name = $request['name'];

        $community->district_id = $district->id;
        
        $community->save();

        session()->flash('message', 'Comunidad actualizado');
        return redirect('/administracion/comunidades/comunidad');
    }
}
