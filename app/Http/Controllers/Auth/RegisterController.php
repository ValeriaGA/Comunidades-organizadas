<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Person;
use App\Role;
use App\Gender;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $genders = Gender::all();
        return view("auth.register", compact("genders"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'secondlastname' => 'required|string|max:255',
            'cedula' => 'required|numeric|between:1,999999999|unique:people,official_id',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // VALIDAR SI LA CEDULA ESTA ASOCIADA AL NOMBRE

        $user_role = Role::where('name', 'LIKE', 'Regular')->get();
        $gender = Gender::where('name', 'LIKE', $data['gender'])->get();

        $person = Person::create([
            'name' => $data['name'],
            'last_name' => $data['lastname'],
            'second_last_name' => $data['secondlastname'],
            'official_id' => $data['cedula'],
            'gender_id' => $gender[0]->id,
            'foreigner' => (array_key_exists('foreigner', $data) ? TRUE : FALSE)
        ]);

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'person_id' => $person->id,
            'role_id' => $user_role[0]->id,
            'avatar_path' => NULL
        ]);
    }
}
