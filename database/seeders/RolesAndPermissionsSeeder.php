<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            // General Permissions
            'browse recipes',
            'view recipes',
            'browse reviews',
            'view reviews',

            // Registered User Permissions
            'post recipes',
            'post reviews',
            'delete own recipes',
            'delete own reviews',

            // Admin Permissions
            'delete any recipes',
            'delete any reviews',
            'manage permissions',
            'manage users',
        ];

        // Create and assign permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $registeredUserRole = Role::firstOrCreate(['name' => 'registered_user']);

        // Assign permissions to roles

        // Admin gets all permissions
        $adminRole->givePermissionTo(Permission::all());

        // Registered users get specific permissions
        $registeredUserRole->givePermissionTo([
            'browse recipes',
            'view recipes',
            'browse reviews',
            'view reviews',
            'post recipes',
            'post reviews',
            'delete own recipes',
            'delete own reviews',
        ]);
    }
}
