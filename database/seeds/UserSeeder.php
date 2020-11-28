<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10)->create();
        $name = "sokoro78";

    //    User::create([
    //         'name'=>$name ,
    //         'slug' =>  Str::of($name)->slug(),
    //         'address'=> "",
    //         'email'=>"info@chiefproperties.co.ke",
    //         'phone'=> "0712468094",
    //         'kra_pin'=>"",
    //         'id_no'=>"",
    //         "image"=>"avater.png",
    //         "type"=>"owner",
    //         'email_verified_at'=> Carbon::now(),
    //         'password'=> Hash::make("@chiefproperties")
    //     ]) ;
    }
}
