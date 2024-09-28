<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class WelcomeSystemNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'icon' => 'info',
            'message' => 'Welcome to Torettos, ' . $notifiable->name . '!',
            'greeting' => 'Hello ' . $notifiable->name . '!',
            'body' => 'We are excited to have you as a part of our community.',
            'action' => 'Visit Torettos',
            'url' => url('/'),
            'thanks' => 'Thank you for choosing Torettos! We look forward to serving you.',
        ];
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
