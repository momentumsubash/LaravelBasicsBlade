<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Session;

class EmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
   private $messages;
    public function __construct($messages)
    {
        $this->messages = $messages;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        $email_data= new MailMessage;
        $email_data = $email_data->subject('New Notification!')
            ->from('momentumsubash@test.com','Email From Momentum Admin')
            // ->line($this->messages['message'])
            // ->action('Notification Action', url($this->messages['url']))
            ->markdown('mail.index', ['message' => $this->messages]);
            
        Session::flash('info','sending email sucess');
        return $email_data;
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
