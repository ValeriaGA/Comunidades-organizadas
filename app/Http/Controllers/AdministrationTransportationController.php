<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatTransportation;

class AdministrationTransportationController extends Controller
{

    public function __construct()
    {
        
        // only administrators are allowed to view this
        $this->middleware('admin');
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

        return redirect('/administracion/seguridad');
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
            'name' => 'required|string|max:255|unique:cat_transportation,name,'.$id,
        ]);

        $catTransportation->name = $request['name'];
        $catTransportation->active = ($request['active'] ? true : false);

        $catTransportation->save();

        session()->flash('message', 'Medio de Transporte actualizado');
        return redirect('/administracion/seguridad');
    }
    
    public function toggle(CatTransportation $catTransportation)
    {
        request()->has('active') ? $catTransportation->activate() : $catTransportation->deactivate();
        
        return back();
    }
}
