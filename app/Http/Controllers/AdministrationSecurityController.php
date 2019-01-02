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
            'name' => 'required|string|max:255|unique:sub_cat_report,name',
            'file' => 'max:2048'
        ]);

        $filename = NULL;
        if ($request->has('file') ? true: false)
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('plugins/images/icons/', $filename);
        }

        $cat_report = CatReport::where('name', 'Seguridad')->first();

        SubCatReport::create([
            'cat_report_id' => $cat_report->id,
            'name' => $request['name'],
            'active' => ($request['active'] ? true : false),
            'multimedia_path' => $filename
        ]);

        session()->flash('message', 'Tipo de reporte de seguridad creado');

        return redirect('/administracion/seguridad');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SubCatReport $subCatReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCatReport $subCatReport)
    {
        return view('administration.security.edit', compact('subCatReport'));
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
            'name' => 'required|string|max:255|unique:sub_cat_report,name,'.$id,
            'file' => 'max:2048'
        ]);

        try{
            $cat = SubCatReport::findOrFail($id);

            if ($request->has('file') ? true: false)
            {
                if ($cat->multimedia_path != '')
                {
                    // File::delete('public/image/users/'.$user->avatar_path);
                    $path = public_path() . '/plugins/images/icons/' . $cat->multimedia_path;
                    if(file_exists($path)) {
                        unlink($path);
                    }
                }

                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename =time().'.'.$extension;
                $file->move('plugins/images/icons/', $filename);

                $cat->multimedia_path = $filename;
            }

            $cat->name = $request['name'];
            $cat->active = ($request['active'] ? true : false);

            $cat->save();

            session()->flash('message', 'Tipo de reporte de seguridad actualizado');
            return redirect('/administracion/seguridad');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }

    public function toggle(SubCatReport $subCatReport)
    {
        request()->has('active') ? $subCatReport->activate() : $subCatReport->deactivate();
        
        return back();
    }
}
