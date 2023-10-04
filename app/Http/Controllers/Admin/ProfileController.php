<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $user = User::find(Auth::user()->id);
            return view('admin.profile.admin_profile', compact('user'));

    } else {
            $user = User::find(Auth::user()->id);
            return view('admin.profile.user_profile', compact('user'));
    }
        //return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function update(UserRequest $request, User $profile)
    {
    $data = $request->validated();

    // Check if a new profile image has been uploaded
    $newImage = $request->file('profile');
    
    if ($newImage) {
       // $main_folder = 'profile_images/';
        $main_folder = 'profile_image/' . Str::random();
        $filename = $newImage->getClientOriginalName();

        // Store the new image with specified visibility settings
        $path = Storage::putFileAs('public/'.
            $main_folder, 
            $newImage, 
            $filename,
            [
                'visibility' => 'public',
                'directory_visibility' => 'public'
            ]
        );

        $data['profile'] = URL::to(Storage::url($path));
        $data['profile_mime'] = $newImage->getClientMimeType();
        $data['profile_size'] = $newImage->getSize();
        
        // If there is an old image, delete it
        if ($profile->profile) {
            $oldImagePath = str_replace(URL::to('/'), '', $profile->profile);
            Storage::delete($oldImagePath);
        }
    }

    $profile->update($data);

    return redirect()->back()->with('toast_success', 'Profile updated successfully');
}


    // password change function
    public function changePassword(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',

        ]);

        $user = User::find(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            if (auth()->user()->hasRole('Admin')) {
                return redirect()->back()->with('toast_success', "Admin Password has been  Updated.");
            } else {
                return redirect()->back()->with('toast_success', "Customer Password has been Updated.");
            }
        } else {
            return redirect()->back()->with('error', "Old password does not match!");
        }
    }

    // phone address update function
    public function PhoneAddressChange(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'phone' => 'required',
            'address' => 'required',

        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        if (auth()->user()->hasRole('Admin')) {
            return redirect()->back()->with('toast_success', "Admin Profile has been  Updated.");
        } else {
            return redirect()->back()->with('toast_success', "Customer Profile has been Updated.");
        }
    }

    public function KpayNoChange(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'kpay_no' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            'kpay_no' => $request->kpay_no,
        ]);

        if (auth()->user()->hasRole('Admin')) {
            return redirect()->back()->with('toast_success', "Admin Profile has been  Updated.");
        } else {
            return redirect()->back()->with('toast_success', "Customer Profile has been Updated.");
        }
    }

        public function JoinDate(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'join_date' => 'required',
        ]);
            $formattedJoinDate = Carbon::createFromFormat('m/d/Y', $request->input('join_date'))->format('Y-m-d');

        $user = User::find(Auth::user()->id);

        $user->update([
            'join_date' => $formattedJoinDate,
        ]);

        if (auth()->user()->hasRole('Admin')) {
            return redirect()->back()->with('toast_success', "Admin Profile has been  Updated.");
        } else {
            return redirect()->back()->with('toast_success', "Customer Profile has been Updated.");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function saveImage(UploadedFile $image)
    {
        $path = 'profile_image/' . Str::random();
        //$path = 'images/product_image';

        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0755, true);
        }
        if (!Storage::putFileAS('public/' . $path, $image, $image->getClientOriginalName())) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }

        return $path . '/' . $image->getClientOriginalName();
    }
}