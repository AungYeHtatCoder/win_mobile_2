<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function profileUpdate(Request $request, $id){
        $request->validate([
            'name',
            'phone',
            'address'
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect('profile')->with('success', 'Profile Update successfully');        
    }

    public function ChangeProfilePw(Request $request, $id){
       $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',

        ]);

        $user = User::find(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect('/profile')->with('success', 'Password Changed successfully');
        } else {
            return redirect()->back()->with('error', "Old password does not match!");
        }
    }
}