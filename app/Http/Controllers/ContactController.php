<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactConfirmMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index');
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
        $request->validate([
            'name' =>'required',
            'email' =>'required | email',
            'phone' =>'nullable',
            'address' =>'nullable',
            'user_message' =>'nullable',
            'photo' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        // file upload
        $fileName = $this->fileUpload($request->file('photo'), 'media/contact/');

        // store database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'user_message' => $request->user_message,
            'photo' => $fileName
        ]);

        // photo url
        $photoUrl = asset('media/contact/' . $fileName);

        // send email
        Mail::to($request->email)->send(new ContactConfirmMail($request->name, $request->email, $request->phone, $request->address, $request->user_message, $photoUrl));

        // return back
        return back()->with('success', 'Email send and data store successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
