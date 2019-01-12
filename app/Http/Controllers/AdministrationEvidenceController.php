<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatEvidence;
use App\Evidence;

class AdministrationEvidenceController extends Controller
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
        $evidences = CatEvidence::orderBy('name', 'asc')->get();

        return view('administration.evidence.index', compact('evidences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.evidence.create');
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
            'name' => 'required|string|max:255|unique:cat_evidence,name'
        ]);

        CatEvidence::create([
            'name' => $request['name'],
            'active' => ($request['active'] ? true : false)
        ]);

        session()->flash('message', 'Tipo de evidencia creada');

        return redirect('/administracion/evidencias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CatEvidence $evidence)
    {
        return view('administration.evidence.edit', compact('evidence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evidence $evidence)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:cat_evidence,name,'.$evidence->id
        ]);

        $evidence->name = $request['name'];
        $evidence->active = ($request['active'] ? true : false);

        $evidence->save();

        session()->flash('message', 'Tipo de evidencia actualizada');
        return redirect('/administracion/evidencias');
    }
    
    public function toggle(CatEvidence $evidence)
    {
        request()->has('active') ? $evidence->activate() : $evidence->deactivate();
        
        return back();
    }
}
