<?php

namespace App\Console\Commands;

use App\Rent;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

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
        $expiredrent = Rent::where('expiry_date',$now)->where('paid_date');
        return 0;
    }
}
