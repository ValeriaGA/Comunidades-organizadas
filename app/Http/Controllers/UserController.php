<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gender;
use App\CommunityAdmin;
use Illuminate\Pagination\Paginator as Paginator;

use File;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_reports = auth()->user()->fetchServiceReports();

        $security_reports = auth()->user()->fetchSecurityReports();

        $news = auth()->user()->fetchNews();

        $communities = [];
        if (auth()->user()->role->name == 'Administrador de Comunidad')
        {
            $communityAdmin = CommunityAdmin::where('user_id', auth()->user()->id)->first();
            if ($communityAdmin != null)
            {
                dd($communityAdmin);
                $communities = $communityAdmin->community;
            }
        }

        $community_requests = auth()->user()->communityRequest;

        $group_requests = auth()->user()->communityGroupRequest;

        return view('user.index', compact('news', 'security_reports', 'service_reports', 'communities', 'community_requests', 'group_requests'));
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
        // $this->authorize('update', $user);

        $genders = Gender::all();
        return view('user.edit', compact('user', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'secondlastname' => 'required|string|max:255',
            'gender' => 'required',
            'file' => 'image|max:2048|dimensions:min_width=50,min_height=50,max_width=700,max_height=700'
        ]);

        $user->person->update([
            'name' => $request['name'],
            'last_name' => $request['lastname'],
            'second_last_name' => $request['secondlastname'],
            'gender_id' => $request['gender']
        ]);

        if ($request->has('file') ? true: false)
        {
            $user->changeAvatar($request->file('file'));
        }

        session()->flash('message', 'Perfil Actualizado');

        
        return redirect('/user');
    }
}
