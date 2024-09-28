<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAdministratorCreatedNotification extends Notification
{
    public function __construct(public User $user)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            //subject
            ->subject('New Administrator Created')
            //greeting
            ->greeting('Hello!')
            //line
            ->line('A new administrator has been created.')
            //action
            ->action('View Administrator', route('admin.user.administrators.edit', $this->user->id))
            //line
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
