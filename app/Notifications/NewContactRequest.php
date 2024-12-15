<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class NewContactRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        protected Contact $contact
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['telegram'];
    }

    /**
     * Get the Telegram representation of the notification.
     */
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content("🔔 New Contact Request\n\n" .
                "👤 Name: {$this->contact->name}\n" .
                "📧 Email: {$this->contact->email}\n" .
                "📱 Phone: {$this->contact->phone}\n" .
                "💬 Message:\n{$this->contact->message}");
    }
}
