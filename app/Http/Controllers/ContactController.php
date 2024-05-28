<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function create()
    {

        return view('emails.contact');
    }

    public function sendEmail(Request $request)
    {

        /*$contact = [
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'messages' => $request->messages
        ];*/

        Mail::to($request->email)->send(new Contact($request->except('_token')));
        return back()->with('success','Mail  envoyé avec succés');

    }


}
