<?php

namespace App\Http\Controllers;

use App\User;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\Gender;
use App\CatReport;
use App\SubCatReport;
use App\Like;
use App\CommunityGroup;

use File;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->first();
        $sub_cat_service = SubCatReport::where('cat_report_id', $cat_service->id)->get();
        $sub_cat_service_ids = array();
        foreach($sub_cat_service as $cat)
        {
            array_push($sub_cat_service_ids, $cat->id);
        }

        $service_reports = Report::whereIn('sub_cat_report_id', $sub_cat_service_ids)
                            ->where('reports.news', false)
                            ->latest()
                            ->paginate(10);

        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();
        $sub_cat_security = SubCatReport::where('cat_report_id', $cat_security->id)->get();
        $sub_cat_security_ids = array();
        foreach($sub_cat_security as $cat)
        {
            array_push($sub_cat_security_ids, $cat->id);
        }

        $security_reports = Report::whereIn('sub_cat_report_id', $sub_cat_security_ids)
                            ->where('reports.news', false)
                            ->latest()
                            ->paginate(10);

        $news = Report::where('news', true)
                        ->latest()
                        ->paginate(10);

        return view('user.index', compact('news', 'security_reports', 'service_reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if (Auth::user()->id != $user->id)
        {
            return redirect('/');
        }

        $genders = Gender::all();
        return view('user.edit', compact('user', 'genders'));
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
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'secondlastname' => 'required|string|max:255',
            'gender' => 'required',
            'file' => 'image|max:2048|dimensions:min_width=50,min_height=50,max_width=700,max_height=700'
        ]);

        try{
            $user= User::findOrFail($id);
            $person = Person::find($user->person_id);

            $person->name = $request['name'];
            $person->last_name = $request['lastname'];
            $person->second_last_name = $request['secondlastname'];

            $person->gender_id = $request['gender'];
            $person->save();

            if ($request->has('file') ? true: false)
            {
                if ($user->avatar_path != '')
                {
                    // File::delete('public/image/users/'.$user->avatar_path);
                    $path = public_path() . '/users/'. $user->id . '/' . $user->avatar_path;
                    if(file_exists($path)) {
                        unlink($path);
                    }
                }

                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename =time().'.'.$extension;
                $file->move('users/'.$user->id, $filename);

                $user->avatar_path = $filename;
            }
            
            $user->save();

            session()->flash('message', 'Profile updated');
            return redirect('/user');
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
