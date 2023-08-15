<?php

namespace App\Notifications;

use App\Mail\WorkBlockedByAdmin;
use App\Models\Work;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WorkBlocked extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private Work $work)
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return new WorkBlockedByAdmin($this->work);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
