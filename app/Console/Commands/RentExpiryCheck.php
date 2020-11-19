<?php

namespace App\Console\Commands;

use App\Rent;
use App\Lease;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ExpiriedRentNotification;

class RentExpiryCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rent:expiryChack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change lease to inactive on all inactive rent and notify user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now =Carbon::now()->format('Y-m-d H:i:s');
        $prev = Carbon::now()->subMonth(1)->format('Y-m-d H:i:s');
        $expiredrents = Rent::where('expiry_date','<',$now)->where('paid_date','>=',$prev)->latest()->get();
        foreach ($expiredrents as $key => $expire) {
            $lease = Lease::where('unit_id',$expire->unit_id)->first();
            $lease->status = 0 ;
            $lease->save();

           Notification::send($expire->user, new ExpiriedRentNotification( $expire ));
            //$expire->user->notify(new ExpiriedRentNotification( $expire )) ;
        }
        return  0;
    }
}
