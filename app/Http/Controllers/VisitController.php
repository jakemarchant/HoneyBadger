<?php

namespace App\Http\Controllers;

use App\Mail\VisitEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VisitController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        // Honeypot field: bots fill in hidden inputs, real visitors never see it.
        if ($request->filled('website')) {
            return redirect(route('visit').'#reserve')->with('visit_status', 'success');
        }

        $validated = $request->validate([
            'Name' => ['required', 'string', 'max:120'],
            'Email' => ['required', 'email', 'max:190'],
            'Phone' => ['nullable', 'string', 'max:40'],
            'Enquiry_type' => ['required', 'string', 'max:60'],
            'Message' => ['nullable', 'string', 'max:2000'],
        ]);

        Mail::to(config('mail.bookings_address'))->send(new VisitEnquiry([
            'name' => $validated['Name'],
            'email' => $validated['Email'],
            'phone' => $validated['Phone'] ?? null,
            'enquiry_type' => $validated['Enquiry_type'],
            'message' => $validated['Message'] ?? null,
        ]));

        return redirect(route('visit').'#reserve')->with('visit_status', 'success');
    }
}
