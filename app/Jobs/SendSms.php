<?php

namespace App\Jobs;

use App\AfricaMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels , AfricaMessage ;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data ;
    public function __construct($data)
    {
        $this->data = $data ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data ;

      return   $this->sendMessage($data['phone'],$data['message']) ;
    }
}
