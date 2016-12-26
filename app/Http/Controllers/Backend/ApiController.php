<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;

class ApiController extends Controller
{
    public function __construct()
    {
      //$this->middleware('auth');
    }


    public function login(Request $request) {
        $credentials = $request->only('email','password');

        if( Auth::attempt($credentials) )
        {
            return json_encode( array('message' => 'success' ) );
        } else {
            return json_encode( array('message' => 'fail' ) );
        }
    }

    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:4',
            'name' => 'required',
            'email' => 'required|unique:User'
        ]);

        if ($validator->fails()) {
          //return $validator->errors();
          return json_encode( array('message' => 'fail' ) );

        } else {

          $input = $request->all();
          $input['api_token'] = str_random(60);
          $input['avatar'] = "http://lorempixel.com/150/150/people/?55009";
          $input['password'] = bcrypt($request->input('password'));
          User::create($input);
          return json_encode( array('message' => 'success' ) );

        }
        
    }

 
}
