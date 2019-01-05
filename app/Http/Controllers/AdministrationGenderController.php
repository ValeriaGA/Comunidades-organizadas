<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;

class AdministrationGenderController extends Controller
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

        $genders = Gender::orderBy('name', 'asc')->get();

        return view('administration.gender.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.gender.create');
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
            'name' => 'required|string|max:255|unique:genders,name'
        ]);

        Gender::create([
            'name' => $request['name'],
        ]);

        session()->flash('message', 'Genero creado');

        return redirect('/administracion/generos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender)
    {
        return view('administration.gender.edit', compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gender $gender)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:genders,name,'.$gender->id
        ]);

        $gender->name = $request['name'];

        $gender->save();

        session()->flash('message', 'Genero actualizado');
        return redirect('/administracion/generos');
    }
}
