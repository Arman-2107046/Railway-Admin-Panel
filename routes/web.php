<?php
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-mail', function() {
    $stakeholders = array_filter(array_map('trim', explode(',', env('STAKEHOLDER_EMAILS'))));

    if (empty($stakeholders)) {
        return 'No valid stakeholder emails found!';
    }

    try {
        Mail::raw('This is a test email from Icepeak contact form.', function ($message) use ($stakeholders) {
            $message->to($stakeholders)
                    ->subject('Test Email');
        });
        return 'Test email sent successfully!';
    } catch (\Exception $e) {
        return 'Error sending email: ' . $e->getMessage();
    }
});

