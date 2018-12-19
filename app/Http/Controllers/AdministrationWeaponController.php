<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatWeapon;

class AdministrationWeaponController extends Controller
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
        return view('administration.security.weapon.create');
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
            'name' => 'required|string|max:255|unique:cat_weapon,name'
        ]);

        CatWeapon::create([
            'name' => $request['name'],
            'active' => ($request['active'] ? true : false)
        ]);

        session()->flash('message', 'Tipo de arma creada');

        return redirect('/administracion/seguridad');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CatWeapon $catWeapon
     * @return \Illuminate\Http\Response
     */
    public function edit(CatWeapon $catWeapon)
    {
        return view('administration.security.weapon.edit', compact('catWeapon'));
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
            'name' => 'required|string|max:255|unique:cat_weapon,name,'.$id,
        ]);

        try{
            $cat = CatWeapon::findOrFail($id);

            $cat->name = $request['name'];
            $cat->active = ($request['active'] ? true : false);

            $cat->save();

            session()->flash('message', 'Tipo de arma actualizada');
            return redirect('/administracion/seguridad');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }
}
