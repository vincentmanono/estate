<?php

namespace App\Console\Commands;

use App\Property;
use App\Rent;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CalculateMonthlyRentTax extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rent:montlyTax';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculating 10 % of monthly tax';

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
       $constantDate = Carbon::now()->subMonth()->format('Y-m-d H:i:s') ;
       $properties = Property::latest()->get();
       foreach ($properties as $key => $property) {
        $monthrentsum = $property->monthlyrent($constantDate)->sum('amount') ;
        $monthtax = $monthrentsum  * 0.1 ;
        $property->taxs()->create(['amount'=>$monthtax]) ;

       }

        return 0;
    }
}
