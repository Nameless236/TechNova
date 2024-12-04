<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * Store a newly created contact message in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);



        return redirect()->route('contact.index')->with('alert', 'Your message has been sent successfully!');
    }

    /**
     * Display the specified contact message.
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact message.
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified contact message in storage.
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('contact.index')->with('alert', 'Contact message updated successfully!');
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('alert', 'Contact message deleted successfully!');
    }
}
