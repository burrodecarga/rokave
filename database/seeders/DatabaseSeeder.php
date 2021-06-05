<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        
        $this->call(RoleSeeder::class);
        // $user=User::create([
        //     'name'  =>'Edwin Henriquez',
        //     'email' =>'ed@gmail.com',
        //     'password'=>bcrypt('123'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10)
        // ]);



        $user=User::create([
           'name'  =>'admin admin',
           'email' =>'admin@gmail.com',
           'password'=>bcrypt('123'),
           'email_verified_at' => now(),
           'remember_token' => Str::random(10)
       ]);


        \App\Models\User::factory(10)->create();

    }
}
