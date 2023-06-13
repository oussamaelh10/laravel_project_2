<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile($name){
        $user = User::where('name', '=', $name)->firstOrFail();
        return view('users.profile', compact('user'));
    }


    public function showProfile()
{
    $user = Auth::user(); 
    return view('users.showprofil', compact('user'));
}
public function update(Request $request, $name)
{
    $profile = Profile::find($id);
    $profile->username = $request->input('username');
    $profile->birthday = $request->input('birthday');
    $profile->bio = $request->input('bio');
    $profile->save();

    $user = User::where('name', $name)->first();

    if (!$user) {
        return back()->with('error', 'User not found');
    }

    $user->password = Hash::make($request->password);
    $user->email = $request->email;
    $user->save();

    return redirect()->route('profile', ['name' => $user->name])->with('success', 'Profile updated successfully');
}
}