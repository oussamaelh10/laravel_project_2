<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Models\FaqQuestion;



class AdminController extends Controller

{

    public function showUsers()
    {

        $users = User::all();

        return view('admin.users', compact('users'));

    }




    public function showUser($id)

    {

        $user = User::findOrFail($id);

        return view('users.profile', compact('user'));

    }




    public function promoteUser($id)

    {

        $user = User::findOrFail($id);

        $user->is_admin = true;

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Gebruiker is succesvol bevorderd tot beheerder.');

    }




    public function demoteUser($id){

    $user = User::findOrFail($id);

    $user->is_admin = false;

    $user->save();




    return redirect()->route('admin.users')->with('success', 'Gebruiker is niet langer beheerder.');

    }

    public function deleteFAQ($id)
    {
        $question = FaqQuestion::findorFail($id);
        // Verwijder de FAQ-vraag
        $question->delete();
    
        return redirect()->back()->with('success', 'FAQ-vraag succesvol verwijderd.');
    }
}


