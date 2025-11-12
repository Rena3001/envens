<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contact = ContactInfo::where('is_active', true)->first();
        return view('client.pages.contact', compact('contact'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Mesajınız uğurla göndərildi! Tezliklə sizinlə əlaqə saxlanılacaq.');
    }
}
