<?php

use Carbon\Factory as CarbonFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Branch::class,20)->create();
    }
}
