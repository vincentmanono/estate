<?php

use Illuminate\Database\Seeder;

class TenantServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TenantService::class,50)->create();
    }
}
