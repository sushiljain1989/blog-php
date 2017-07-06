<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


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

    #use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    #protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function createUser(Request $request)
    {

      $data = array(
        'name'=>$request->input('name') ,
        'email' => $request->input('email'),
        'password' => $request->input('password')
      );

      $this->validator($data);
      try {
        User::create(['name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),]);
        $msg = "User created successfully";
      }
      catch (QueryException $e) {
        if($e->getCode() == 23000 )
        {
          $msg = "Email Already exists";
        }
      }




      return view('auth.createuser',['msg' => $msg]);

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
            'email' => 'required|string|email|max:95|unique:users',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
