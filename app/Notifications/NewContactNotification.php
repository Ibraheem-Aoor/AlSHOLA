<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactNotification extends Notification
{
    use Queueable;

    public $userType , $name , $subject , $message , $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->message = $data['message'];
        $this->userType = $data['userType'];
        $this->subject = $data['subject'];
        $this->email = $data['email'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'name' => $this->name,
            'message' => $this->message,
            'email' => $this->email,
            'subject' => $this->subject,
            'userType' => $this->userType,
        ]);
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }






    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
