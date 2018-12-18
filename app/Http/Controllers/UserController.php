<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\CatReport;

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
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();

        $news = Report::where('news', true)
                        ->where('active', true)
                        ->where('user_id', Auth::id())
                        ->latest()
                        ->paginate(10);

        $security_reports_results = DB::table('reports')
                            ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                            ->select('reports.*')
                            ->where('sub_cat_report.cat_report_id', $cat_security->id)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->where('user_id', Auth::id())
                            ->latest()
                            ->get();
                            // ->paginate(10);

        $security_reports = collect();

        foreach ($security_reports_results as $result) {
            $security_reports->push(new Report( (array) $result ));
        }

        $service_reports_results = DB::table('reports')
                            ->join('sub_cat_report', 'reports.sub_cat_report_id', '=', 'sub_cat_report.id')
                            ->select('reports.*')
                            ->where('sub_cat_report.cat_report_id', $cat_service->id)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->where('user_id', Auth::id())
                            ->latest()
                            ->get();
                            // ->paginate(10);

        $service_reports = collect();

        foreach ($service_reports_results as $result) {
            $service_reports->push(new Report( (array) $result));
        }

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
        return view('user.edit', compact('user'));
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
            'file' => 'max:2048'
        ]);

        try{
            $user= User::findOrFail($id);

            $user->name = $request['name'];

            if ($request->has('file') ? true: false)
            {
                // Deleting not working
                if ($user->avatar_path != '')
                {
                    // File::delete('public/image/users/'.$user->avatar_path);
                    $path = public_path() . '/image/users/' . $user->avatar_path;
                    if(file_exists($path)) {
                        unlink($path);
                    }
                }

                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename =time().'.'.$extension;
                $file->move('images/users', $filename);

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
