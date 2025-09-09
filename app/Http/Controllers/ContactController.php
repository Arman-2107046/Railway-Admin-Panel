<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate incoming data
        $data = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Store in database
        $contact = Contact::create($data);

        // Send email to stakeholders
        // $stakeholders = ['stakeholder1@example.com', 'stakeholder2@example.com']; // replace with real emails

$stakeholders = array_filter(array_map('trim', explode(',', env('STAKEHOLDER_EMAILS'))));


foreach ($stakeholders as $email) {
    Mail::html("
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> {$data['user_name']}</p>
        <p><strong>Email:</strong> {$data['user_email']}</p>
        <p><strong>Subject:</strong> " . ($data['subject'] ?? 'No subject') . "</p>
        <p><strong>Message:</strong><br>" . nl2br($data['message']) . "</p>
        <p><a href='mailto:{$data['user_email']}'>Reply to User</a></p>
    ", function ($message) use ($email) {
        $message->to($email)
                ->subject('New Contact Form Submission');
    });
}


        return response()->json([
            'message' => 'Message sent successfully!',
            'data' => $contact
        ]);
    }
}
