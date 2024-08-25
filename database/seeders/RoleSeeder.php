<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'create recipes']);
        Permission::create(['name' => 'edit recipes']);
        Permission::create(['name' => 'delete recipes']);

        $admin->givePermissionTo(Permission::all());
        $user->givePermissionTo(['create recipes', 'edit recipes', 'delete recipes']);
    }
}
