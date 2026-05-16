<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WorkerCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $worker;

    /**
     * Create a new notification instance.
     */
    public function __construct($newWorker)
    {
        $this->worker = $newWorker;
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Ваш аккаунт сотрудника создан')
            ->greeting('Добро пожаловать!')
            ->line('Ваш аккаунт сотрудника был создан.');
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
