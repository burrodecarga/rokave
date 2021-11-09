<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset permisions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         //create permissions
        $json =File::get("database/data/master.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
         $permission = new Permission();
         $permission->name = $obj->name;
         $permission->permission = $obj->permission;
         $permission->save();
        }

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

         $user = User::create([
             'name' => "Edwin Henriquez",
             'email' => "ed@gmail.com",
             'password' => bcrypt('123'),
             'email_verified_at' => now(),
             'remember_token' => Str::random(10),

         ]);
        $user->assignRole('super-admin');

          $role = Role::create(['name' => 'gerente-planificacion', 'area' => 'operativa']);
          //$role->givePermissionTo($gerente_planificacion);

          $role = Role::create(['name' => 'jefe-planificacion', 'area' => 'operativa']);
        //  $role->givePermissionTo($jefe_planificacion);

          $role = Role::create(['name' => 'planificador', 'area' => 'operativa']);
         // $role->givePermissionTo($planificador);

          $role = Role::create(['name' => 'gerente-mantenimiento', 'area' => 'operativa']);
        //  $role->givePermissionTo($gerente_mantenimiento);

          $role = Role::create(['name' => 'jefe-mantenimiento', 'area' => 'operativa']);
       //   $role->givePermissionTo($jefe_mantenimiento);

          $role = Role::create(['name' => 'jefe-supervisores', 'area' => 'operativa']);
       //   $role->givePermissionTo($jefe_supervisores);

          $role = Role::create(['name' => 'supervisor', 'area' => 'operativa']);
       //   $role->givePermissionTo($supervisor);

          $role = Role::create(['name' => 'tecnico-mantenimiento', 'area' => 'operativa']);
      //    $role->givePermissionTo($tecnico);

          $role = Role::create(['name' => 'operador-equipo', 'area' => 'operativa']);
      //    $role->givePermissionTo($operador);

          $role = Role::create(['name' => 'operador-zona', 'area' => 'operativa']);
      //    $role->givePermissionTo($operador);

          // or may be done by chaining
          $role = Role::create(['name' => 'inhabilitado', 'area' => 'operativa']);
          //    ->givePermissionTo(['publish articles', 'unpublish articles']);

          $role = Role::create(['name' => 'admin', 'area' => 'operativa']);

          $json =File::get("database/data/redes.json");
          $data = json_decode($json);
          foreach ($data as $obj) {
           $brand = new Brand();
           $brand->name = $obj->name;
           $brand->icon = $obj->icon;
           $brand->save();
          }


      }
}
