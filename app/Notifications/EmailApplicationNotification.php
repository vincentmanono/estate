<?php

namespace App\Notifications;

use App\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailApplicationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $status , $application ;
    public function __construct( $status , Application $application )
    {
        $this->status = $status;
        $this->application = $application;
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
        $app = $this->application ;
        // dd($app->property->user) ;
        $status = ($this->status) ? "Approved" : "Desclined" ;
        return (new MailMessage)

                    ->line('This mail is to notify you that your application request at chiefProperties on '. $app->property->name .' property  have been '. $status )
                    ->line("please contact the  property manager")
                    ->line('Manager Name : '.  $app->property->user->name )
                    ->line('Manager Phone : '.  $app->property->user->phone )
                    ->line('Manager Email : '.  $app->property->user->email )
                    ->action('Visit our rite', url(config('app.url')))
                    ->subject('Application Response')
                    ->greeting($app->name)
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
