<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCatReport;
use App\CatReport;
use App\CatWeapon;
use App\CatTransportation;

class AdministrationSecurityController extends Controller
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
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $categories_security = SubCatReport::where('cat_report_id', $cat_security[0]->id)->get();

        $categories_weapon = CatWeapon::all();
        $categories_transportation = CatTransportation::all();

        return view('administration.security.index', compact('categories_security', 'categories_weapon', 'categories_transportation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.security.create');
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
            'name' => 'required|string|max:255|unique:sub_cat_report,name'
        ]);

        State::create([
            'name' => $request['name'],
            'active' => ($request['active'] ? true : false)
        ]);

        session()->flash('message', 'Tipo de reporte de seguridad creado');

        return redirect('/administracion/seguridad');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCatReport $security)
    {
        return view('administration.security.edit', compact('security'));
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
            'name' => 'required|string|max:255|unique:sub_cat_report,name'
        ]);

        try{
            $service = State::findOrFail($id);

            $service->name = $request['name'];
            $service->active = ($request['active'] ? true : false);

            $service->save();

            session()->flash('message', 'Tipo de reporte de seguridad actualizado');
            return redirect('/administracion/seguridad');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }
}
