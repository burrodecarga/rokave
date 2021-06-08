<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Condominio;
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
                $user=User::create([
           'name'  =>'admin admin',
           'email' =>'admin@gmail.com',
           'password'=>bcrypt('123'),
           'email_verified_at' => now(),
           'remember_token' => Str::random(10)
       ]);


        \App\Models\User::factory(10)->create();

        for ($i=0; $i <10 ; $i++) {
          $condominio = Condominio::create([
              'name' =>'Condominio-N° '.$i,
              'rut' =>'Condominio-Rut r-'.$i,
              'address' =>'Condominio-Address '.$i,
              'phone' =>'Condominio-phones '.$i,
              'mobil' =>'Condominio-mobil '.$i,
              'email' =>'condominio'.$i.'@gmail.com',
          ]);

          for ($j=0; $j <30 ; $j++) {
             $apartment = Apartment::create([
                'name' =>'Apartment Condominio-N° '.$j,
                'address' =>'Apartment Condominio-Address '.$j,
                'name' =>'Condominio-N° '.$j,
                'phone' =>'Condominio-phones '.$j,
                'mobil' =>'Condominio-mobil '.$j,
                'area' =>$j*rand(1,8),
                'alicuota' =>0.1*rand(1,8),
                'condominio_id' => $condominio->id
             ]);
          }
        }

    }
}
