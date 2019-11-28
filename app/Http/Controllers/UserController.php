<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;

use App\User;
use Session;

use Illuminate\Http\Request;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('sign_guard' , ['except'=>['logout'] ]);
    }


    public function getSignin()
    {
        $data['title'] = "Signin Page";
        return view('forms.signin',$data);  
    }

    public function postSignin(SigninRequest $request)
    {
        // dd($request->toArray());
        $rd = !empty($request['rd'])? $request['rd']: '';
        if(User::validate_user($request['email'],$request['password']))
        {
            return redirect($rd);
        }
        else
        {
            $data['title'] = "Signin Page";
            // dd($request);
            return view('forms.signin',$data)->withErrors('Wrong Email Or Password');
        }
    }

    public function getSignup()
    {
        $data['title'] = "Signup Page";
        return view('forms.signup',$data);
    }

    public function postSignup(SignupRequest $request)
    {
        // dd($request->toArray());
        User::save_new_user($request);
        return redirect('/');

    }

    public function logout()
    {
        Session::flush();
        return redirect('user/signin');
    }



}
