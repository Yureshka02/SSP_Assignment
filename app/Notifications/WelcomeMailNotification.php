<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeMailNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Torettos, ' . $notifiable->name . '!')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('We are excited to have you as a part of our community.')
            ->line('Feel free to explore our platform and make the most out of it.')
            ->action('Visit Torettos', url('/'))
            ->line('Thank you for choosing Torettos! We look forward to serving you.');
    }


    public function toArray($notifiable): array
    {
        return [];
    }
}
