<?php

use Illuminate\Database\Seeder;
use App\Branch;
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
        $this->call(UnitSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepositSeeder::class);

    }
}
