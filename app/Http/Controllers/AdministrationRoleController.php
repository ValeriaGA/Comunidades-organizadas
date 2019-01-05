<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Person;
use App\Role;

class AdministrationRoleController extends Controller
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
        $roles = Role::all();
        $users = User::orderBy('role_id', 'asc')->get();
        return view('administration.roles.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.roles.create');
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
            'name' => 'required|string|max:255|unique:roles,name'
        ]);

        Role::create([
            'name' => $request['name']
        ]);

        session()->flash('message', 'Rol creado');

        return redirect('/administracion/roles');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate(request(), [
            'role' => 'required'
        ]);

        $roles = Role::all();

        $users;
        foreach($roles as $role)
        {
            if ($role->name == $request['role'])
            {
                $users = User::where('role_id', $role->id)->orderBy('role_id', 'asc')->get();
            }
        }
        return view('administration.roles.index', compact('users', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('administration.roles.edit', compact('role'));
    }

    public function editUser(User $user)
    {
        $roles = Role::all();
        return view('administration.roles.user', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
        ]);


        $role->name = $request['name'];
        
        $role->save();

        session()->flash('message', 'Role actualizado');
        return redirect('/administracion/roles');
    }


    public function updateUser(Request $request, User $user)
    {
        $this->validate(request(), [
            'role' => 'required'
        ]);

        $role = Role::where('name', $request['role'])->firstOrFail();;

        $user->role_id = $role->id;
        
        $user->save();

        session()->flash('message', 'Usuario actualizado');
        return redirect('/administracion/roles');
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
