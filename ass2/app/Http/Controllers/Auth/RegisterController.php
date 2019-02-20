<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [      //Didnt use the RegisterController that is instead handled in the USER controller
                                            // did attempt this though this is where data would of been validated
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email',
            'dob'=>'required',
            'password'=>'required|min:4',
            'password_confirm'=>'required|min:4|same:password',
            'image'=>'required',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {                                                   // this was the user create function still cant tell why didnt work page would just reload 
        return User::create([                           // this is just the same as the example only with extra feilds but would not work. 
            $image_store = request()->file('image')->store('profile', 'public'),    //instead user controller handle this and works as intended
            'name' => $data['name'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'password' => bcrypt($data['password']),
            'image' => $image_store
        ]);
    }
}
