<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Person;
use App\Role;
use App\Gender;

class AdministrationUsersController extends Controller
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
        $admin_role = Role::where('name', 'LIKE', 'Administrador')->first();
        
        $admins = User::where('role_id', $admin_role->id)->get();
        return view('administration.administrator.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        return view('administration.administrator.create', compact('genders'));
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
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'secondlastname' => 'required|string|max:255',
            'cedula' => 'required|numeric|between:1,999999999|unique:people,official_id',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);


        $user_role = Role::where('name', 'LIKE', 'Administrador')->get();
        $gender = Gender::where('name', 'LIKE', $request['gender'])->get();

        $person = Person::create([
            'name' => $request['name'],
            'last_name' => $request['lastname'],
            'second_last_name' => $request['secondlastname'],
            'official_id' => $request['cedula'],
            'gender_id' => $gender[0]->id,
            'foreigner' => ($request['active'] ? true : false)
        ]);

        // (array_key_exists('foreigner', $request) ? TRUE : FALSE)

        User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'person_id' => $person->id,
            'role_id' => $user_role[0]->id,
            'avatar_path' => NULL
        ]);

        session()->flash('message', 'Account created');

        return redirect('administracion/administradores');
    }
}
