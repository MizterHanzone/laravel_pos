<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public Function Login(Request $rq){
        $Email = $rq->input('Email');
        $Password = $rq->input('Password');

        $result = DB::table('users')->join('position', 'users.position_id', '=', 'position.position_id')
        ->where('users.email', '=', $Email)
        ->where('users.password', '=', $Password)
        ->first();

        if(isset($result)){
            $user_id = $result->user_id;
            $name = $result->name;
            $email = $result->email;
            $photo = $result->photo;
            $position_name = $result->position_name;

            session(['auth'=>true, 'user_id'=>$user_id, 'name'=>$name, 'email'=>$email, 'photo'=>$photo, 'position_name'=>$position_name]);
            session(['message'=>'Login Successful!  Welcome Back, ' . $name . '.', 'type'=>'success']);

            return redirect('/admin/cart');
        }else{

            session(['message'=>'Login Failed!  Please try again.', 'type'=>'danger']);
            
            return redirect('/auth/login');
        }
    }

    public function Logout(Request $rq){
        $rq->session()->flush();
        session(['message'=>'Logout Successful!  See You Later.', 'type'=>'success']);
        
        return redirect('/auth/login');
    }
}
