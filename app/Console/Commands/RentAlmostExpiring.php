<?php

namespace App\Console\Commands;

use App\Rent;
use App\User;
use App\Lease;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RentAlmostToExpireNotification;

class RentAlmostExpiring extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rent:AlmostExpired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify user when rent  is remaining 5 days to expire';

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
        $tenants = User::where('type','tenant')->get();

        $now =Carbon::now()->format('Y-m-d H:i:s');
        $fiveDaysToExpire = Carbon::now()->addDays(5)->format('Y-m-d H:i:s');
        $rentsRemaing5Days = Rent::where('expiry_date','=>',$now)->where('expiry_date','<=',$fiveDaysToExpire )
        ->whereBetween('expiry_date', [ $now, $fiveDaysToExpire ])->get() ;

        foreach ($rentsRemaing5Days as $key => $expire) {
            $datetoexpire = ($expire->expiry_date)->format('Y-m-d H:i:s') ;
           Notification::send($expire->user, new RentAlmostToExpireNotification( $expire ));
        }



        return 0;
    }
}
