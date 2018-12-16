<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCatReport;
use App\CatReport;

class AdministrationServiceController extends Controller
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
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->get();
        $categories_service = SubCatReport::where('cat_report_id', $cat_service[0]->id)->get();

        return view('administration.service.index', compact('categories_service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.service.create');
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

        session()->flash('message', 'Tipo de reporte de servicio creado');

        return redirect('/administracion/servicio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCatReport $service)
    {
        return view('administration.service.edit', compact('service'));
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

            session()->flash('message', 'Tipo de reporte de servicio actualizado');
            return redirect('/administracion/servicio');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }
}
