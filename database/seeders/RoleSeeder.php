<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
         Permission::create(['name' => 'roles.index', 'permission' => 'listar roles']);
         Permission::create(['name' => 'roles.create', 'permission' => 'crear roles']);
         Permission::create(['name' => 'roles.store', 'permission'  => 'crear roles']);
         Permission::create(['name' => 'roles.show', 'permission'   => 'ver detalle de role']);
         Permission::create(['name' => 'roles.edit', 'permission'   => 'modificar role']);
         Permission::create(['name' => 'roles.update', 'permission' => 'modifica role']);
         Permission::create(['name' => 'roles.destroy', 'permission' => 'eliminar role']);

         Permission::create(['name' => 'permissions.index', 'permission' => 'listar permisos']);
         Permission::create(['name' => 'permissions.create', 'permission' => 'crear permisos']);
         Permission::create(['name' => 'permissions.store', 'permission'  => 'crear permisos']);
         Permission::create(['name' => 'permissions.show', 'permission'   => 'ver detalle de permiso']);
         Permission::create(['name' => 'permissions.edit', 'permission'   => 'modificar permiso']);
         Permission::create(['name' => 'permissions.update', 'permission' => 'modifica permiso']);
         Permission::create(['name' => 'permissions.destroy', 'permission' => 'eliminar permiso']);

          Permission::create(['name' => 'zones.index', 'permission' => 'listar zones']);
          Permission::create(['name' => 'zones.create', 'permission' => 'crear zones']);
          Permission::create(['name' => 'zones.store', 'permission'  => 'crear zones']);
          Permission::create(['name' => 'zones.show', 'permission'   => 'ver detalle de zone']);
          Permission::create(['name' => 'zones.edit', 'permission'   => 'modificar zone']);
          Permission::create(['name' => 'zones.update', 'permission' => 'modifica zone']);
          Permission::create(['name' => 'zones.destroy', 'permission' => 'eliminar zone']);

          Permission::create(['name' => 'users.index', 'permission' => 'listar usuarios']);
          Permission::create(['name' => 'users.create', 'permission' => 'crear usuarios']);
          Permission::create(['name' => 'users.store', 'permission'  => 'crear usuarios']);
          Permission::create(['name' => 'users.show', 'permission'   => 'ver detalle de usuario']);
          Permission::create(['name' => 'users.edit', 'permission'   => 'modificar usuario']);
          Permission::create(['name' => 'users.update', 'permission' => 'modifica usuario']);
          Permission::create(['name' => 'users.destroy', 'permission' => 'eliminar usuario']);

          Permission::create(['name' => 'profiles.index', 'permission' => 'listar perfiles']);
          Permission::create(['name' => 'profiles.create', 'permission' => 'crear perfiles']);
          Permission::create(['name' => 'profiles.store', 'permission'  => 'crear perfiles']);
          Permission::create(['name' => 'profiles.show', 'permission'   => 'ver detalle de perfil']);
          Permission::create(['name' => 'profiles.edit', 'permission'   => 'modificar perfil']);
          Permission::create(['name' => 'profiles.update', 'permission' => 'modifica perfil']);
          Permission::create(['name' => 'profiles.destroy', 'permission' => 'eliminar perfil']);



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


      }
}
