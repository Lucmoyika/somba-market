<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorDemoSeeder extends Seeder
{
    /**
     * Seed a demo vendor account for local access to vendor features.
     */
    public function run(): void
    {
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Demo',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        if (! $adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }

        $vendorUser = User::firstOrCreate(
            ['email' => 'vendor@example.com'],
            [
                'name' => 'Vendor Demo',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        if (! $vendorUser->hasRole('vendor')) {
            $vendorUser->assignRole('vendor');
        }

        Vendor::firstOrCreate(
            ['user_id' => $vendorUser->id],
            [
                'name' => 'Demo Vendor',
                'slug' => 'demo-vendor',
                'description' => 'Compte de démonstration pour les fonctionnalités Vendor.',
                'phone' => '+243000000000',
                'email' => 'vendor@example.com',
                'status' => Vendor::STATUS_ACTIVE,
            ]
        );
    }
}
