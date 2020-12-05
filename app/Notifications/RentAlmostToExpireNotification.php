<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RentAlmostToExpireNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $rent ;
    public function __construct($rent)
    {
        $this->rent = $rent;
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
     *$num
     * if the number exist
     * update (cleartextpass) = $newvalue from tablename where 'phone' =$number;
     * else add the colun
     * 
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $rent = $this->rent ;
        return (new MailMessage)->error()
                ->greeting("Hello ". $rent->user->name)
                    ->line('Your rent for '. $rent->unit->name . ' ( '. $rent->unit->property->name . ' )')
                    ->line('will expired on '. $rent->expiry_date)
                    ->line("Your lease for the unit will be closed on the date written above until you renew your rent subscription")
                    ->action('Login ', url(route('home')))
                    ->line('Thank you for using  for truesting us!');
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
