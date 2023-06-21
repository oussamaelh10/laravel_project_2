<?php
namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function thankyou()
    {
        return view('contact.thankyou');
    }

    public function submit(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    $contact = new Contact;
    $contact->name = $validatedData['name'];
    $contact->email = $validatedData['email'];
    $contact->message = $validatedData['message'];
    $contact->save();

    Mail::to('lerifton99@gmail.com')->send(new ContactFormSubmitted($validatedData));

    return redirect()->back()->with('success', 'Bedankt voor je bericht! We nemen zo snel moegelijk contact met je op.');
}
}