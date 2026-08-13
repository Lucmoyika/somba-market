<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin role if it doesn't exist
        if (! Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        // Create admin user or get existing
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('secret'),
            ]
        );

        // Assign role
        if (! $user->hasRole('admin')) {
            $user->assignRole('admin');
        }
    }
}
