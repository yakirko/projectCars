<?php

namespace App;

use DB, Session, Hash;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
    static public function validate_user($email, $pass)
    {
        $valid = false;

        $user = DB::table('users AS u')
        ->join('users_roles AS ur', 'u.id', '=', 'ur.uid')
        ->where('u.email', '=',$email)
        ->first();
        // dd($valid);
    
        if($user && Hash::check($pass, $user->password))   //base password for admin is 123456 . before the Hase.//
        {
            $valid = true;
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            if($user->rid == 1)  Session::put('is_admin', true);

            Session::flash('success_message','Welcome Back '. $user->name);

        }
        return $valid;
    }


    static public function save_new_user($request)
    {

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        $uid = $user->id;
        DB::insert("INSERT INTO users_roles VALUES($uid,3)");

        // LOGIN user
        Session::put('user_id', $uid);
        Session::put('user_name', $request['name']);

        Session::flash('success_message','Welcome '. $request['name']);
    }

}
