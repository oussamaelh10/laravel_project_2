<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function profile($name){
        $user = User::where('name', '=', $name)->firstOrFail();
        return view('users.profile', compact('user'));
    }


    public function showProfile()
{
    $user = Auth::user(); 
    return view('profil', compact('user'));
}
public function update(Request $request, $name)
{
    $user = User::where('name', $name)->first();

    if (!$user) {
        return back()->with('error', 'User not found');
    }

    $user->password = Hash::make($request->password);
    $user->email = $request->email;
     $user->bio = $request->input('bio');
        $user->name = $request->input('username');

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
   
    $user->save();

    return redirect()->route('profile', ['name' => $user->name])->with('success', 'Profile updated successfully');
}



}