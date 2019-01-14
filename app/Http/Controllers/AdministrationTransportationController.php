<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatWeapon;
use App\CatReport;
use App\SubCatReport;
use App\CatTransportation;

class AdministrationTransportationController extends Controller
{

    public function __construct()
    {
        
        // only administrators are allowed to view this
        $this->middleware('admin');
    }

    public function index()
    {
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $categories_security = SubCatReport::where('cat_report_id', $cat_security[0]->id)->get();

        $categories_weapon = CatWeapon::all();
        $categories_transportation = CatTransportation::all();

        $tabName = 'transportation';

        return view('administration.security.index', compact('categories_security', 'categories_weapon', 'categories_transportation', 'tabName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.security.transportation.create');
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
            'name' => 'required|string|max:255|unique:cat_transportation,name'
        ]);

        CatTransportation::create([
            'name' => $request['name'],
            'active' => ($request['active'] ? true : false)
        ]);

        session()->flash('message', 'Medio de Transporte creado');

        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CatTransportation $catTransportation
     * @return \Illuminate\Http\Response
     */
    public function edit(CatTransportation $catTransportation)
    {
        return view('administration.security.transportation.edit', compact('catTransportation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CatTransportation $catTransportation)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:cat_transportation,name,'.$catTransportation->id,
        ]);

        $catTransportation->name = $request['name'];
        $catTransportation->active = ($request['active'] ? true : false);

        $catTransportation->save();

        session()->flash('message', 'Medio de Transporte actualizado');
        return $this->index();
    }
    
    public function toggle(CatTransportation $catTransportation)
    {
        request()->has('active') ? $catTransportation->activate() : $catTransportation->deactivate();
        
        return back();
    }
}
