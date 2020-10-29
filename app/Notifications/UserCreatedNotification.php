<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $password;
    public function __construct($user , $password)
    {
        $this->user = $user;
        $this->password = $password ;
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
        $user = $this->user ;
        $password = $this->password;
        return (new MailMessage)
        ->subject("Account created")
        ->from('info@chiefproperties.co.ke',"Chief Properties")
        ->greeting("Hello ". $this->user->name)
        ->line('Your account has been created successfully')
        ->line("Your login creditials are as follows")
        ->line("Email : ". $user->email )
        ->line("Password : ". $password )
        ->line("Please make sure you update your password after first login")
        ->action('Login now', url(route('login')))
        ->line('Thank you for trusting '.config('app.name') ) ;


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
