<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Other seeders can be called here
        $this->call(RolesAndPermissionsSeeder::class);

        // Optionally, create an admin user
        User::factory()->create([
            'username' => 'AdminUser', // Use 'username' instead of 'name'
            'email' => 'mrdoofenshmirtz02@gmail.com',
            'password' => bcrypt('password123'),
        ])->assignRole('admin');

        User::factory()->create([
            'username' => 'TestUser', // Use 'username' instead of 'name'
            'email' => 'test@example.com',
        ]);
    }
}
