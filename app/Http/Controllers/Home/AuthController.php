<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        if(Auth::check()){
            return redirect('/')->with('error', "You have logged in.");
        }else{
            return view('register');
        }
    }

    public function login(){
        if(Auth::check()){
            return redirect('/')->with('error', "You have logged in.");
        }else{
            return view('login');
        }
    }

    public function profile(){
        if(Auth::check()){
            return view('profile');
        }else{
            return redirect('/')->with('error', "Please Login first.");
        }
    }
}
