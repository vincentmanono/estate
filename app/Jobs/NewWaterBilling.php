<?php

namespace App\Jobs;

use App\Water;
use App\AfricaMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewWaterBilling implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels ,AfricaMessage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $water ;
    public function __construct(Water $water)
    {
        $this->water = $water ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $water = $this->water;
        $phone = $water->unit->leased->user->phone ;
        $phone = array($phone) ;
        $message = "New Water reading\n".'Unit : '. $water->unit->name . " ( ". $water->unit->property->name." )\n"."Previous Reading : ". $water->previous_reading ." Units ". " New Reading : ".$water->new_reading . "\nBilling Amount : ". number_format($water->amount,2);
      
      $result =  $this->sendMessage( $phone ,$message) ;
 
    }
}
