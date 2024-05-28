<?php

namespace App\Http\Controllers;

use App\Mail\Share;
use App\Models\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShareController extends Controller
{

    public function create()
    {

        return view('startup.show');
    }

    public function store(Request $request){
      /*  $contact = [
            'send' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'messages' => $request->messages
        ];*/
    }

    public function share(Request $request,Startup $startup)
    {
        Mail::to($request->send)->send(new Share($request->except('_token')));
        return redirect('startup/'.$startup)->with('success','Mail  envoyé avec succés');

    }

}
