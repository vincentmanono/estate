<?php

namespace App\Jobs;

use App\Application;
use App\Notifications\EmailApplicationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class EmailApplicant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $app = $this->application ;
       $app->notify(new EmailApplicationNotification($this->status,$this->application)) ;
    }
}
