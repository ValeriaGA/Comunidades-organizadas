<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        $reports = User::find(Auth::user()->id)->reports;
        return view('user.index', compact('reports'));
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
