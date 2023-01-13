<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Spatie modelo de roles
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear los roles necesarios
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);
        $role3 = Role::create(['name' => 'Viewer']);

        // Permisos necesarios para ver, crear, editar y eliminar
        // Permiso para ver dashboard de admin
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        // Permisos de usuarios
        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($role1);

        // Permisos de categorias
        // Ver categoria
        Permission::create(['name' => 'admin.categories.index'])->assignRole($role1);
        // Crear categoria
        Permission::create(['name' => 'admin.categories.create'])->assignRole($role1);
        // Editar categoria
        Permission::create(['name' => 'admin.categories.edit'])->assignRole($role1);
        // Eliminar categoria
        Permission::create(['name' => 'admin.categories.destroy'])->assignRole($role1);

        // Permisos de tags
        Permission::create(['name' => 'admin.tags.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.destroy'])->assignRole($role1);

        // Permisos de post
        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy'])->assignRole($role1);

    }
}
