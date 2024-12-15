<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Notifications\NewContactNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function store(ContactRequest $request): JsonResponse
    {
        $contact = Contact::create([
            ...$request->validated(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Notification::route('telegram', config('services.telegram.chat_id'))
            ->notify(new NewContactNotification($contact));

        return response()->json([
            'message' => 'Your message has been sent successfully!',
            'contact' => $contact,
        ], 201);
    }
}
