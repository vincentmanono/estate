<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\Maintenance;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(BranchSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(DepositSeeder::class);
        $this->call(ExpenseSeeder::class);
        $this->call(LeaseSeeder::class);
        $this->call(GuestSeeder::class);
        $this->call(WaterSeeder::class);
        $this->call(FloorSeeder::class);
        $this->call(RentSeeder::class);
        $this->call(MaintenanceSeeder::class);

    }
}
