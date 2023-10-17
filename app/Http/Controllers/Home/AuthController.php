<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'address',
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,            
        ]);
        return redirect('profile')->with('success', 'Profile Update successfully');        
    }

   public function changeProfile(Request $request) {
    $user = Auth::user(); // Get the currently authenticated user

    // Validate the form data, including the uploaded file
    $request->validate([
        'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
    ]);

    // Check if a new profile image has been uploaded
    if ($request->hasFile('profile')) {
        $newImage = $request->file('profile');
        $mainFolder = 'profile_image/' . Str::random();
        $filename = $newImage->getClientOriginalName();

        // Store the new image with specified visibility settings
        $path = Storage::putFileAs('public/' . $mainFolder, $newImage, $filename, [
            'visibility' => 'public',
            'directory_visibility' => 'public',
        ]);

        // Update user's profile information with the new image details
        $user->profile = URL::to(Storage::url($path));
        $user->profile_mime = $newImage->getClientMimeType();
        $user->profile_size = $newImage->getSize();
        
        // If there is an old image, delete it
        if ($user->getOriginal('profile')) {
            $oldImagePath = str_replace(URL::to('/'), '', $user->getOriginal('profile'));
            Storage::delete($oldImagePath);
        }

        $user->save(); // Save the user model with updated profile information
    }

    return redirect('profile')->with('success', 'Profile updated successfully');
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
            return redirect('profile')->with('success', "Password has been  Updated.");

        } else {
            return redirect()->back()->with('error', "Old password does not match!");
        }
    }
}