<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 
    public function home()
    {
        return view('welcome');
    }

    public function contact_us(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Message Sent Successfully !');
        
    }
}
