<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Contact;
use Mail;


class ContactController extends Controller{

  public function contact(){

        return view('contact.contact');

    }

    public function show(){

        return view('contact');

    }




    public function submit(Request $request)

    {

        // Valideer het ingediende contactformulier

        $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ]);

        //store data in Database

        Contact::create($request->all());

        //Send mail to admin
        Mail::send('emails.contact-message', array(
            'name' => $request->get('name'),
            'email' =>$request->get('email'),
            'user_query' =>$request->get('message'),),
            function($message) use ($request){
                $message->from($request->email);
                $message->to('elhallabioussama@outlook.com');
            
    });

        return back()->with('Message has been send with succes');

    }
        // Verwerk het ingediende contactformulier (bijvoorbeeld opslaan in de database, verzenden via e-mail, etc.)
        // Stuur een bedankbericht

      

    }



