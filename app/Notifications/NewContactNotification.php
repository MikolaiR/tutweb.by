<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class NewContactNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Contact $contact
    ) {}

    public function via($notifiable): array
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable): TelegramMessage
    {
        $message = "🔔 New Contact Form Submission\n\n";
        $message .= "👤 Name: {$this->contact->name}\n";
        $message .= "📧 Email: {$this->contact->email}\n";
        
        if ($this->contact->phone) {
            $message .= "📱 Phone: {$this->contact->phone}\n";
        }
        
        if ($this->contact->service) {
            $message .= "🛠 Service: {$this->contact->service->title}\n";
        }
        
        $message .= "\n📝 Message:\n{$this->contact->message}\n\n";
        $message .= "🌐 IP: {$this->contact->ip_address}";

        return TelegramMessage::create()
            ->content($message);
    }
}
