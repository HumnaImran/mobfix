<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormNotification;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;

use App\Mail\Notification;

class ContactController extends Controller
{
    //

    public function Contactstore(Request $request){
        // dd($request);
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
        'subject' => 'required|string',
    ]);
    contactUs::create($request->all());
    Mail::to('humnaimran785@gmail.com')->send(new ContactFormNotification($request->all()));



    return redirect()->back()->with('message', 'Thank you for your submission!');



}

public function viewAllContacts()
{
    $contacts=ContactUs::all();
    return view('Backend.Contacts.viewcontacts',compact('contacts'));
}
}
