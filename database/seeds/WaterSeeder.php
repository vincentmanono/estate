<?php

use Illuminate\Database\Seeder;

class WaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Water::class,50)->create();
    }
}
