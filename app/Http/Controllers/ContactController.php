<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewContactRequest;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $contact = Contact::create($validated);

        // Send notification via Telegram
        if (config('services.telegram.bot_token') && config('services.telegram.chat_id')) {
            Notification::route('telegram', config('services.telegram.chat_id'))
                ->notify(new NewContactRequest($contact));
        }

        return redirect()
            ->route('contact')
            ->with('success', __('Thank you for your message. We will contact you soon!'));
    }
}
